<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Request as Ajax;

class Events extends Controller
{
    /**
     * Visualiza todos os eventos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $events = \App\Models\Events::where('user_id', \Auth::user()->id)->get();
        return view('pages.events.index', [
            'events' => isset($events) ? $events : '[]'
        ]);
    }

    /**
     * Exibe os detalhes de um evento
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id )
    {
        $event = \App\Models\Events::find( $id );
        $charts = \App\Helpers\Events::getEventPerAge( $event );


//        dd(\Auth::user()->profile->fields);

        return view('pages.events.details', [
            'event' => $event,
            'charts' => [
                'birth' => $charts['ages'],
                'genre' => $charts['genre']
            ]
        ]);
    }

    /**
     * Cria a avaliação
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function evaluate(Request $request )
    {
        if( $request->all() ) {
            $db = \DB::table('events_evaluate')
                ->insert([
                    'event_id' => (int) $request->input('event'),
                    'user_id' => (int) $request->input('user'),
                    'star' => (int) $request->input('star')
                ]);
            if( $db ) {
                return response()
                    ->json([
                        'success' => true,
                        'message' => 'Sua avaliação foi salva.'
                    ], 200);
            } else {
                return response()
                    ->json([
                        'success' => false,
                        'message' => 'Não foi possível fazer a avaliação.'
                    ], 402);
            }
        }
    }

    /**
     * Exibe a lista de eventos com os confirmados
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmeds()
    {
        $events = \App\Models\Events::all();
        foreach( $events as $event ) {
            if( $event->is_confirmed ) {
                $data[] = $event;
            }
        }
        return view('pages.events.confirmeds', [
            'events' => (isset($data) ? $data : null)
        ]);
    }

    /**
     * Exibe os confirmados de um evento
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmedsEvent( $id )
    {
        $event = \App\Models\Events::find( $id );
        return view('pages.events.confirmed', [
            'event' => $event
        ]);
    }

    /**
     * Exibe a view do formulário de editar
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( $id )
    {
        $event = \App\Models\Events::find( $id );
        $categories = \App\Models\Category::all();
        return view('pages.events.update', [
            'event' => $event,
            'categories' => $categories
        ]);
    }

    /**
     * Exibe a view para criar evento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('pages.events.create', [
            'categories' => $categories
        ]);
    }


    /**
     * Confirma usuário no evento
     * Rota em: routes/api.php
     * Usa-se com ajax
     * @param Request $request
     */
    public function confirm(Request $request)
    {
        $fields = $request->all();

        $db = \DB::table('events_confirmeds')->insert([
            'user_id' => $fields['user'],
            'event_id' => $fields['event'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if( $db ) {
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Você está confirmado'
                ], 200);
        } else {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'Não foi possível confirmar'
                ], 402);
        }
    }

    /**
     * Favorita o evento
     * Rota em: routes/api.php
     * Usa-se com ajax
     * @param Request $request
     */
    public function favorite(Request $request)
    {
        $fields = $request->all();

        $db = \DB::table('events_favorite')->insert([
            'user_id' => (int) $fields['user'],
            'event_id' => (int) $fields['event'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if( $db ) {
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Você está confirmado'
                ], 200);
        } else {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'Não foi possível confirmar'
                ], 402);
        }
    }

    /**
     * Salva o evento (cria)
     * @param Request $request
     */
    public function store(Request $request )
    {
        $fields = $request->all();
        if( $fields ) {
            $event = new \App\Models\Events();
            $event->user_id = $fields['author'];
            $event->name = $fields['name'];
            $event->categories = json_encode( $fields['categories'] );
            $event->value = $fields['value'];
            $event->description = $fields['description'];
            $event->address = $fields['address'];
            $event->cep = $fields['cep'];
            $event->bairro = $fields['bairro'];
            $event->city = $fields['city'];
            $event->state = $fields['state'];

            $event->init_at = $fields['init_at'];
            $event->end_at = $fields['end_at'];

            $event->classification = $fields['classification'];
            $event->period =  $fields['period'];

            if( !isset( $event->image_url ) && isset( $fields['img'] ) ) {
                $event->image()->create( \App\Helpers\Files::get( $request->file('img') ) );
            }

            if( $event->save() ) {
                session()->flash('success', 'Evento criado com sucesso!');
                return redirect('panel/events/update/' . $event->id);
            } else {
                session()->flash('error', 'Não foi possível criar esse evento.');
                return redirect( 'panel/events/new' )
                    ->withInput( $fields );
            }
        }
    }

    /**
     * Atualiza o evento
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id )
    {
        $fields = $request->all();

        if( $fields ) {
            $event = \App\Models\Events::find( $id );
            $event->name = $fields['name'];
            $event->categories = json_encode($fields['categories']);
            $event->value = $fields['value'];
            $event->description = $fields['value'];
            $event->address = $fields['address'];
            $event->cep = $fields['cep'];
            $event->bairro = $fields['bairro'];
            $event->city = $fields['city'];
            $event->state = $fields['state'];

            $event->init_at = $fields['init_at'];
            $event->end_at = $fields['end_at'];

            $event->classification = $fields['classification'];
            $event->period =  $fields['period'];

            if( !isset( $event->image_url ) && isset( $fields['img'] ) ) {
                $event->image()->create( \App\Helpers\Files::get( $request->file('img') ) );
            }


            if( $event->save() ) {
                \App\Helpers\Events::setNotification( $event );
                session()->flash('success', 'Evento salvado com sucesso!');
                return redirect('panel/events/update/' . $id);
            } else {
                session()->flash('error', 'Não foi possível salvar esse evento.');
                return redirect('panel/events/update/' . $id)
                    ->withInput( $fields );
            }
        }
    }

    /**
     * Deleta o evento
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id )
    {
        $event = \App\Models\Events::find( $id );

        if( $event->delete() ) {
            return redirect('panel/events');
        } else {
            session()->flash('error', 'Não foi possível deletar o evento.');
            return redirect('panel/events');
        }
    }
}

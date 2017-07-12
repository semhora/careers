<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class Dashboard extends Controller
{
    public function index()
    {
        if( \Auth::user()->role == 'user' ) {
            return $this->indexUser();
        } else {
            return $this->indexAd();
        }
    }

    public function indexUser()
    {
        $categories = Category::all();
        $events = Events::all();
        $preferences = Events::preferences()->get();
        $json = json_encode( $events->toArray() );

        return view('pages.dashs.user', [
            'categories' => $categories,
            'events' => $events,
            'preferences' => $preferences,
            'json' => $json
        ]);
    }

    public function indexAd()
    {
        $events = Events::where('user_id', \Auth::user()->id)->take(5)->get();

        foreach( $events as $event )
        {
            $confirmeds['name'][] = $event->name;
            $confirmeds['totals'][] = $event->total_confirmeds;
            $confirmeds['stars'][] = $event->evaluate;
            $confirmeds['favorites'][] = $event->evaluate;
        }

        $days = \App\Helpers\Events::getLastDays();

        return view('pages.dashs.ad', [
            'confirmeds' => [
                'name' => (isset($confirmeds['name']) ? json_encode( $confirmeds['name'] ): '[]'),
                'totals' => (isset($confirmeds['totals']) ? json_encode( $confirmeds['totals'] ): '[]'),
                'stars' => (isset($confirmeds['stars']) ? json_encode( $confirmeds['stars'] ): '[]'),
                'favorites' => (isset($confirmeds['favorites']) ? $confirmeds['favorites'] : null)
            ],
            'lines' => [
                'events' => (isset($events) ? \App\Helpers\Events::getLastEvents() : null),
                'days' => (isset($events) ? json_encode($days) : null)
            ]
        ]);
    }

}

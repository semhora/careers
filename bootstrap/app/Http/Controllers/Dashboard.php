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
//        dd(\App\Helpers\Events::getLastEvents());
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

        return view('pages.dashs.user', [
            'categories' => $categories,
            'events' => $events,
            'preferences' => $preferences
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
                'name' => json_encode( $confirmeds['name'] ),
                'totals' => json_encode( $confirmeds['totals'] ),
                'stars' => json_encode( $confirmeds['stars'] ),
                'favorites' => $confirmeds['favorites']
            ],
            'lines' => [
                'events' => \App\Helpers\Events::getLastEvents(),
                'days' => json_encode($days)
            ]
        ]);
    }

}

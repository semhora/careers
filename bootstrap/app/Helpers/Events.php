<?php
/**
 * Created by PhpStorm.
 * User: raank
 * Date: 28/10/16
 * Time: 01:06
 */

namespace App\Helpers;


use App\Mail\EventEdited;
use Carbon\Carbon;

class Events
{
    static public function getClass( $get = null )
    {
        $array = [
            1 => 'Sozinho',
            2 => 'Com Amigos',
            3 => 'Com a família',
            4 => 'Com o/a parceiro(a)',
            5 => 'Com os filhos'
        ];
        return (isset($get) ? $array[$get] : $array);
    }

    static public function getPeriod( $get = null )
    {
        $array = [
            'M' => 'Manhã',
            'T' => 'Tarde',
            'N' => 'Noite'
        ];
        return (isset($get) ? $array[$get] : $array);
    }

    static public function userConfirmed( $event )
    {
        $user = \Auth::user()->is_confirmed;
        return ($user ? true : false);
    }

    static public function getEvaluate( $stars )
    {
        if( count($stars) > 0 ) {
            $note = [
                1 => 2,
                2 => 4,
                3 => 6,
                4 => 8,
                5 => 10
            ];

            $ql = '(';
            $nt = '(';

            foreach( $stars as $star ) {
                $ql .= "{$star->star}*{$note[$star->star]} + ";
                $nt .= "{$note[$star->star]} + ";
            }

            $ql .= ')';
            $nt .= ')';
            $returnQL = str_replace( ' + )', ')', $ql );
            $returnNT = str_replace( ' + )', ')', $nt );
            eval( "\$return = $returnQL / $returnNT;" );
            return number_format($return, 2, '.', '');
        } else {
            return 0;
        }
    }

    static public function getLastEvents()
    {
        $events = \App\Models\Events::where('user_id', \Auth::user()->id)
            ->take( 5 )
            ->get();

        $colors = [
            0 => '255, 99, 132',
            1 => '75, 192, 192',
            2 => '255, 206, 86',
            3 => '30, 30, 30',
            4 => '153, 102, 255',
        ];

        foreach ( $events as $key => $event )
        {
            $newEvents[] = [
                'name' => $event->name,
                'id'   => $event->id,
                'color' => $colors[ $key ],
                'data' => self::getData( $event->id )
            ];
        }

        return (isset($newEvents) ? $newEvents : null);
    }

    static public function getData( $id )
    {
        for( $i = 0; $i <= 4; $i++ )
        {
            $date = date('m-d', strtotime("-{$i} days"));
            $return[$i] = \DB::table('events_favorite')
                ->where('event_id', $id)
                ->whereDate('created_at', 'LIKE', "%{$date}%")
                ->get()
                ->count();
        }

        return (isset($return) ? $return : null);
    }

    static public function getLastDays()
    {
        for( $i = 0; $i <= 4; $i++ )
        {
            $date = date('d/m', strtotime("-{$i} days"));
            $new[] = $date;
        }

        krsort( $new );

        foreach ($new as $d)
        {
            $data[] = $d;
        }

        return (isset($data) ? $data : null);
    }

    static public function getEventPerAge( $event )
    {
        $confirmeds = $event->confirmeds;

        $ages = [
            '0-20'  => [],
            '20-30' => [],
            '30-40' => [],
            '40>'   => []
        ];

        $genre = [
            'masc' => [],
            'fem' => []
        ];

        foreach( $confirmeds as $id ) {
            $user = \App\Models\User::find( $id );
            $birth = $user->profile->fields->birth;
            $birthDate = explode('/', $birth);
            $age = (date('md', date('U', mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date('md')
                ? ((date('Y') - $birthDate[2]) - 1)
                : (date('Y') - $birthDate[2]));

            if( $user->profile->fields->genre == 'masc' ) {
                array_push( $genre['masc'], $id );
            } else {
                array_push( $genre['fem'], $id );
            }

            switch ( $age ) {
                case ( $age > 0 && $age < 20 ):
                    array_push( $ages['0-20'], $age );
                    break;
                case ( $age >= 20 && $age < 30 ):
                    array_push( $ages['20-30'], $age );
                    break;
                case ( $age >= 30 && $age < 40 ):
                    array_push( $ages['30-40'], $age );
                    break;
                default:
                    array_push( $ages['40>'], $age );
                    break;
            }
        }

        return [
            'ages' => [
                '0-20'  => count( $ages['0-20'] ),
                '20-30' => count( $ages['20-30'] ),
                '30-40' => count( $ages['30-40'] ),
                '40>'   => count( $ages['40>'] )
            ],
            'genre' => [
                'masc'  => count( $genre['masc'] ),
                'fem'   => count( $genre['fem'] )
            ]
        ];
    }

    static public function setNotification( $event )
    {
        if( $event->total_confirmeds > 0 )
        {
            $when = Carbon::now()->addMinute(1);
            foreach( $event->confirmeds as $item )
            {
                $user = \App\Models\User::find($item);
                \Mail::to( $user->email )
                    ->later($when, new EventEdited( $event, $user->email ));
            }
        }
    }
}
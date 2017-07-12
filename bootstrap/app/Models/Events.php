<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'status',
        'value',
        'description',
        'address',
        'cep',
        'bairro',
        'city',
        'state'
    ];

    protected $appends = [
        'url',
        'distance',
        'init',
        'end',
        'edit',
        'image_url',
        'foto',
        'confirmeds',
        'is_confirmed',
        'total_confirmeds',
        'price',
        'evaluate',
        'is_evaluate',
        'total_evaluate',
        'is_favorite',
        'total_favorite'
    ];

    protected $dates = [ 'init_at', 'end_at' ];

    public function image()
    {
        return $this->morphMany( Files::class, 'attach' );
    }

    public function getIsConfirmedAttribute()
    {
        return \App\Helpers\Events::userConfirmed( $this->attributes['id'] );
    }

    public function getTotalConfirmedsAttribute()
    {
        return \DB::table('events_confirmeds')
            ->where('event_id', $this->attributes['id'])
            ->get()
            ->count();
    }

    public function getImageUrlAttribute()
    {
        if( isset( $this->image[0] ) ) {
            return [
                'full' => $this->image[0]->url,
                'thumbnail' => $this->image[0]->thumbnail,
                'medium' => $this->image[0]->medium,
                'id' => $this->image[0]->id
            ];
        } else {
            return null;
        }
    }

    public function getFotoAttribute()
    {
        return (isset($this->image[0]) ? $this->image[0]->medium : null);
    }

    public function getInitAttribute()
    {
        $createdAt = Carbon::parse($this->attributes['init_at']);
        return $createdAt->format('d/m/Y, \à\s\ H:i');
    }

    public function getEndAttribute()
    {
        $createdAt = Carbon::parse($this->attributes['end_at']);
        return $createdAt->format('d/m/Y, \à\s\ H:i');
    }

    public function getCategoriesAttribute()
    {
        $array = $this->attributes['categories'];
        return (isset($array) ? (array) json_decode( $array ) : null);
    }

    public function getEditAttribute()
    {
        return url('panel/events/update/' . $this->attributes['id']);
    }

    public function getStatusAttribute()
    {
        return ($this->attributes['status'] == 'open' ? 'Aberto' : 'Encerrado');
    }

    public function getValueAttribute()
    {
        return \App\Helpers\Helpers::real( $this->attributes['value'] );
    }

    public function getUrlAttribute()
    {
        return url('panel/events/details/' . $this->attributes['id']);
    }

    public function getDistanceAttribute()
    {
        $origins = \Auth::user()->profile->fields->cep;
        $destinations = $this->attributes['cep'];
        $mode = 'CAR';
        $language = 'PT';
        $str = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins={$origins}|&destinations={$destinations}|&mode={$mode}|&language={$language}|&sensor=false");
        $distance = new SimpleXMLElement( $str );
        return (isset($distance->status) ? (string) $distance->row->element->distance->text : null);
    }

    public function scopePreferences( $query )
    {
        $preferences = \Auth::user()->categories;
        $total = (count( $preferences ) - 1);
        $rand = $preferences[ rand(0, $total) ];

        return $query->where('categories', 'LIKE', '%"' . $rand . '"%');
    }

    public function getPriceAttribute()
    {
        return (int) str_replace([',','.'], '', $this->attributes['value']);
    }

    public function getEvaluateAttribute()
    {
        $values = \DB::table('events_evaluate')
            ->where('event_id', $this->attributes['id'])
            ->get();

        return \App\Helpers\Events::getEvaluate( $values );
    }

    public function getTotalEvaluateAttribute()
    {
        $values = \DB::table('events_evaluate')
            ->where('event_id', $this->attributes['id'])
            ->get()
            ->count();
        return $values;
    }

    public function getTotalFavoriteAttribute()
    {
        $values = \DB::table('events_favorite')
            ->where('event_id', $this->attributes['id'])
            ->get()
            ->count();
        return $values;
    }

    public function getClassificationAttribute()
    {
        return \App\Helpers\Events::getClass( $this->attributes['classification'] );
    }

    public function getPeriodAttribute()
    {
        return \App\Helpers\Events::getPeriod( $this->attributes['period'] );
    }

    public function getIsEvaluateAttribute()
    {
        $table = \DB::table('events_evaluate')
            ->where('event_id', $this->attributes['id'])
            ->where('user_id', \Auth::user()->id)
            ->first();

        return isset( $table ) ? true : false;
    }

    public function getIsFavoriteAttribute()
    {
        $table = \DB::table('events_favorite')
            ->where('event_id', $this->attributes['id'])
            ->where('user_id', \Auth::user()->id)
            ->first();

        return isset( $table ) ? true : false;
    }

    public function getConfirmedsAttribute()
    {
        $table = \DB::table('events_confirmeds')
            ->where('event_id', $this->attributes['id'])
            ->get();

        foreach( $table as $user )
        {
            $users[] = $user->user_id;
        }

        return (isset($users) ? $users : null);
    }
}

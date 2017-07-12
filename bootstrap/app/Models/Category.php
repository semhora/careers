<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $appends = [ 'created', 'edit_url' ];


    public function getCreatedAttribute()
    {
        $createdAt = Carbon::parse($this->attributes['created_at']);
        return $createdAt->format('d/m/Y, \à\s\ H:i');
    }

    public function getEditUrlAttribute()
    {
        return url('panel/categories/update/' . $this->attributes['id']);
    }
}

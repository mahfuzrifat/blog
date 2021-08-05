<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 class Category extends Model
{
    protected $fillable = [
        'name', 'slug','photo','c_status',
    ];

    public function posts(){
    	return $this->belongsToMany('App\Post')->withTimestamps();
    }
}

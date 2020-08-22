<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function comment(){
        return $this->hasMany('App\Comment')
//            ->withPivot('comment')
            ;
    }
}

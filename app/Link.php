<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
    	'user_id',
        'slot',
        'key',
    ];

    public $timestamps = false;
    protected  $table = 'links';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model
{
    protected $fillable = [
    	'user_id',
        'document_name', 
    ];

    public $timestamp = true;
    protected  $table = 'user_documents';
}

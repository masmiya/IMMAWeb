<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model
{
    protected $fillable = [
    	'user_id',
        'document_name', 
        'url',
        'slot',
    ];

    public $appends = [
    	'full_path',
    ];

    public $timestamp = true;
    protected  $table = 'user_documents';

    public function getFullPathAttribute() {
    	return asset($this->url);
    }
}

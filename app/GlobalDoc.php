<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalDoc extends Model
{
    protected $fillable = [
        'document_name', 
        'url',
        'version',
    ];

    public $appends = [
    	'full_path',
    ];

    public $timestamp = true;
    protected  $table = 'global_documents';

    public function getFullPathAttribute() {
    	return asset($this->url);
    }
}

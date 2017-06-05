<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'order_emails',
    	'info_page',
    	'admin_username',
    	'admin_password',
    	'admin_email',
    ];
}

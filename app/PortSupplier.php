<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortSupplier extends Model
{
    protected $fillable = [
        'company_name', 
        'issa_membership_number', 
        'website', 
        'category', 
        'specialised_in',
        'address',
        'phone',
        'fax',
        'hours',
        'email',
        'contact1_name',
        'contact1_mobile',
        'contact2_name',
        'contact2_mobile',
        'also_serves',
        'iso',
    ];
}

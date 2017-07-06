<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $fillable = [
        'name', 'longitude', 'latitude', 'country', 'description',
    ];

    public function suppliers() {
    	$suppliers = PortSupplier::where('port_id', $this->id)->get();

    	return $suppliers;
    }
}

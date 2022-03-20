<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $fillable =[
        'name'        
    ];

    public $timestamps = false;

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}

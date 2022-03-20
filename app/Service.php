<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'port', 'application_id', 'type_id'        
    ];

    protected $dates = ['deleted_at'];

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    public function type()
    {
        return $this->belongsTo('App\ServiceType');
    }

    public function meteringReaders()
    {
        return $this->hasMany('App\MeteringReader');
    }

    public function statusReaders()
    {
        return $this->hasMany('App\StatusReader');
    }
}

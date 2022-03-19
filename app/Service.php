<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Application;
use App\MeteringReader;
use App\ServiceType;
use App\StatusReader;

class Service extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'port', 'application_id', 'type_id'        
    ];

    protected $dates = ['deleted_at'];

    public function application()
    {
        return $this->belongsTo('Application');
    }

    public function type()
    {
        return $this->belongsTo('ServiceType');
    }

    public function meteringReaders()
    {
        return $this->hasMany('MeteringReader');
    }

    public function statusReaders()
    {
        return $this->hasMany('StatusReader');
    }
}

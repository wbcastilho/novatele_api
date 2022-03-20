<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'organization_id', 'parent_id'        
    ];

    protected $dates = ['deleted_at'];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
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

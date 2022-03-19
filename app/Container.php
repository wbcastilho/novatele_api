<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\MeteringReader;
use App\Organization;
use App\StatusReader;

class Container extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'organization_id', 'parent_id'        
    ];

    protected $dates = ['deleted_at'];

    public function organization()
    {
        return $this->belongsTo('Organization');
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

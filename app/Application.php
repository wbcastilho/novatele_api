<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'organization_id'        
    ];

    protected $dates = ['deleted_at'];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
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

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function dashboards()
    {
        return $this->hasMany('App\Dashboard');
    }
}

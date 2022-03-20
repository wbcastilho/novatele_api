<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name'        
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function containers()
    {
        return $this->hasMany('App\Container');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}

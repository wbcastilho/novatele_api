<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Application;
use App\Container;
use App\Department;
use App\User;

class Organization extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name'        
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('User');
    }

    public function departments()
    {
        return $this->hasMany('Department');
    }

    public function containers()
    {
        return $this->hasMany('Container');
    }

    public function applications()
    {
        return $this->hasMany('Application');
    }
}

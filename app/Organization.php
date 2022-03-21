<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Organization extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name'        
    ];

    protected $dates = ['deleted_at']; 
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Organization;
use App\User;

class Department extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'organization_id'        
    ];

    protected $dates = ['deleted_at'];

    public function organization()
    {
        return $this->belongsTo('Organization');
    }

    public function users()
    {
        return $this->hasMany('User');
    }
}

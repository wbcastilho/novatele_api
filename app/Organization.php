<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
}

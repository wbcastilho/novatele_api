<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Group extends Model
{
    protected $fillable =[
        'name'        
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('User');
    }
}

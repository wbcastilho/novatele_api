<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Department;

class Dashboard extends Model
{
    protected $fillable =[
        'name', 'department_id'        
    ];

    protected $dates = ['deleted_at'];

    public function department()
    {
        return $this->belongsTo('Department');
    }
}

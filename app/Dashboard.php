<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable =[
        'name', 'department_id'        
    ];

    protected $dates = ['deleted_at'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function fieldsets()
    {
        return $this->hasMany('App\Fieldset');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fieldset extends Model
{
    protected $fillable =[
        'name', 'dashboard_id'        
    ];

    protected $dates = ['deleted_at'];

    public function dashboard()
    {
        return $this->belongsTo('App\Dashboard');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}

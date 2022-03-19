<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Dashboard;
use \App\Item;

class Fieldset extends Model
{
    protected $fillable =[
        'name', 'dashboard_id'        
    ];

    protected $dates = ['deleted_at'];

    public function dashboard()
    {
        return $this->belongsTo('Dashboard');
    }

    public function items()
    {
        return $this->hasMany('Item');
    }
}

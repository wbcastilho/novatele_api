<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Dashboard;

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
}

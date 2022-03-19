<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Fieldset;

class Item extends Model
{
    protected $fillable =[
        'name', 'fieldset_id'        
    ];

    protected $dates = ['deleted_at'];

    public function fieldset()
    {
        return $this->belongsTo('Fieldset');
    }
}

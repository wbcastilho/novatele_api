<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Fieldset;
use \App\MeteringReader;

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

    public function meteringReaders()
    {
        return $this->belongsToMany('MeteringReader', 'items_metering_readers', 'item_id', 'metering_id');
    }
}

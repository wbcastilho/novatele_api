<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable =[
        'name', 'fieldset_id'        
    ];

    protected $dates = ['deleted_at'];

    public function fieldset()
    {
        return $this->belongsTo('App\Fieldset');
    }

    public function meteringReaders()
    {
        return $this->belongsToMany('App\MeteringReader', 'items_metering_readers', 'item_id', 'metering_id');
    }

    public function statusReaders()
    {
        return $this->belongsToMany('App\StatusReader', 'items_status_readers', 'item_id', 'status_id');
    }
}

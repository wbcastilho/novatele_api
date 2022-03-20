<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeteringReader extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'min_param', 'max_param', 'unity', 'parent_id', 'service_id'        
    ];

    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo('App\Container');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item', 'items_metering_readers', 'metering_id', 'item_id');
    }
}

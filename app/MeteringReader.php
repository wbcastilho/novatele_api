<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Container;
use App\Item;
use App\Service;

class MeteringReader extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'min_param', 'max_param', 'unity', 'parent_id', 'service_id'        
    ];

    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo('Container');
    }

    public function service()
    {
        return $this->belongsTo('Service');
    }

    public function items()
    {
        return $this->belongsToMany('Item', 'items_metering_readers', 'metering_id', 'item_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Container;
use App\Item;
use App\Service;

class StatusReader extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'parent_id', 'service_id'        
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
        return $this->belongsToMany('Item', 'items_status_readers', 'status_id', 'item_id');
    }
}

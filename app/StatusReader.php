<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusReader extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'parent_id', 'service_id'        
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
        return $this->belongsToMany('App\Item', 'items_status_readers', 'status_id', 'item_id');
    }
}

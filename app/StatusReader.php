<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Container;

class StatusReader extends Model
{
    use SoftDeletes;
    
    protected $fillable =[
        'name', 'parent_id'        
    ];

    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo('Container');
    }
}

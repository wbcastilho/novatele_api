<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Container;

class MeteringReader extends Model
{
    use SoftDeletes;

    protected $table = 'meteringreaders';
    
    protected $fillable =[
        'name', 'min_param', 'max_param', 'unity', 'parent_id'        
    ];

    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo('Container');
    }

}

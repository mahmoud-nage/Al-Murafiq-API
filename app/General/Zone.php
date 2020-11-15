<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model 
{
    protected $table = 'zones';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'area_id');
    // protected $visible = array('name_ar', 'name_en', 'area_id');

    public function area()
    {
        return $this->belongsTo('App\General\Area', 'area_id');
    }

}
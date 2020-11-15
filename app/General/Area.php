<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{

    protected $table = 'areas';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'city_id', 'active');
    // protected $visible = array('name_ar', 'name_en', 'city_id', 'active');

    public function city()
    {
        return $this->belongsTo('App\General\City', 'city_id');
    }

    public function zones()
    {
        return $this->hasMany('App\General\Zone');
    }

}

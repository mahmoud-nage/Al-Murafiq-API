<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'country_id', 'active');
    // protected $visible = array('name_ar', 'name_en', 'country_id', 'active');

    public function country()
    {
        return $this->belongsTo('App\General\Country', 'country_id');
    }

    public function areas()
    {
        return $this->hasMany('App\General\Area');
    }

}
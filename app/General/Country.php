<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model 
{

    protected $table = 'countries';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'currency_id', 'icon', 'active', 'default');
    // protected $visible = array('name_ar', 'name_en', 'currency_id', 'icon', 'active', 'default');

    public function cities()
    {
        return $this->hasMany('App\General\City');
    }

    public function currency()
    {
        return $this->belongsTo('App\General\Currency', 'currency_id');
    }

}
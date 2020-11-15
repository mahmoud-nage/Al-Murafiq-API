<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSettings extends Model 
{

    protected $table = 'general_settings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('logo', 'favicon', 'address_ar', 'address_en', 'site_ar', 'site_en', 'lat', 'lon');
    // protected $visible = array('logo', 'favicon', 'address_ar', 'address_en', 'site_ar', 'site_en', 'lat', 'lon');

}
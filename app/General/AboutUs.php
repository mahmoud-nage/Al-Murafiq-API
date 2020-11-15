<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model 
{
    protected $table = 'about_us';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'active', 'in_home');
    // protected $visible = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'active', 'in_home');

    public function files()
    {
        return $this->morphMany('App\General\File', 'fileable');
    }

}
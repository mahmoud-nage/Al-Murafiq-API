<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model 
{

    protected $table = 'blogs';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'active', 'in_home', 'read_num');
    // protected $visible = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'active', 'in_home', 'read_num');

    public function files()
    {
        return $this->morphMany('App\General\File', 'fileable');
    }

}
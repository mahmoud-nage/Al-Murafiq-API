<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{

    protected $table = 'policies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'type', 'active');
    // protected $visible = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'type', 'active');

    public function file()
    {
        return $this->morphOne('App\General\File', 'fileable');
    }

}

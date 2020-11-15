<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    protected $table = 'parteners';


    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array( 'name_ar', 'name_en', 'logo', 'active');
    // protected $visible = array( 'name_ar', 'name_en', 'logo', 'active');
}

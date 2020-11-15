<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;

class BusinessSettings extends Model 
{

    protected $table = 'business_settings';
    public $timestamps = true;
    protected $fillable = array('type', 'value');
    // protected $visible = array('type', 'value');

}
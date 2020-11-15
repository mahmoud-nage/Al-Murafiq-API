<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model 
{

    protected $table = 'tokens';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('fcm_token', 'provider');
    // protected $visible = array('fcm_token', 'provider');

}
<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model 
{
    protected $table = 'socials';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'link', 'active', 'icon', 'icon_type');
    // protected $visible = array('name', 'link', 'active', 'icon', 'icon_type');

}
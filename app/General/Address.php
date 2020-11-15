<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    protected $table = 'addresses';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'area_id', 'phone', 'special_mark', 'address_details', 'lat', 'lon', 'active');
    // protected $visible = array('user_id', 'area_id', 'phone', 'special_mark', 'address_details', 'lat', 'lon', 'active');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function area()
    {
        return $this->belongsTo('App\General\Area', 'area_id');
    }

}

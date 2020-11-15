<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{

    protected $table = 'admins';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('type');
    // protected $visible = array('type');

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

}

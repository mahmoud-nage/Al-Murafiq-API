<?php

namespace App\Affilate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affilate extends Model
{

    protected $table = 'affilates';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('ssd', 'total_companies');
    // protected $visible = array('ssd', 'total_companies');

    public function companies()
    {
        return $this->belongsToMany('App\Company\Company', 'affilate_companies');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

}

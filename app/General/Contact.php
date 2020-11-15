<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'subject', 'message', 'view');
    // protected $visible = array('user_id', 'subject', 'message', 'view');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
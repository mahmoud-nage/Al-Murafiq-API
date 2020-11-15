<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'title_ar', 'title_en', 'body_ar', 'body_en', 'type');
    // protected $visible = array('user_id', 'title_ar', 'title_en', 'body_ar', 'body_en', 'type');

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'adminNotifications', 'user_id');
    }

}
<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model 
{
    protected $table = 'reviews';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'company_id', 'comment', 'active', 'rate', 'likes_count', 'dislikens_count');
    // protected $visible = array('user_id', 'company_id', 'comment', 'active', 'rate', 'likes_count', 'dislikens_count');

    public function users()
    {
        return $this->belongsToMany('App\User', 'comment_likes', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company\Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
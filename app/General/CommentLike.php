<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentLike extends Model 
{

    protected $table = 'comment_likes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'review_id', 'type', 'reson');
    // protected $visible = array('user_id', 'review_id', 'type', 'reson');

}
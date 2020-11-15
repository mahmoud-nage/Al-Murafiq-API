<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model 
{
    protected $table = 'wishlists';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'company_id');
    // protected $visible = array('user_id', 'company_id');

    public function company()
    {
        return $this->belongsTo('App\Company\Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
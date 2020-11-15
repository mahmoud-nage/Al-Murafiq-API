<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{    
    protected $table = 'users';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at','birth_date'];
    protected $fillable = array('provider', 'provider_id', 'name', 'userable_id', 'userable_type', 'email', 'email_verified_at', 'remember_token', 'password', 'avatar', 'birth_date', 'gender', 'default_lang', 'phone', 'city_id', 'area_id', 'zone_id', 'reset_code', 'national_id', 'api_token', 'fcm_token', 'active', 'type', 'country_id');
    protected $visible = array('provider', 'provider_id', 'name', 'userable_id', 'userable_type', 'email', 'email_verified_at', 'remember_token', 'avatar', 'birth_date', 'gender', 'default_lang', 'phone', 'city_id', 'area_id', 'zone_id', 'reset_code', 'national_id', 'api_token', 'fcm_token', 'active', 'type', 'country_id');
    protected $hidden = array('password', 'api_token');


    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
    
    public function userable()
    {
        return $this->morphTo();
    }

    public function notifications()
    {
        return $this->belongsToMany('App\General\Notification', 'notification_id');
    }

    public function adminNotifications()
    {
        return $this->hasMany('App\General\Notification');
    }

    public function addresses()
    {
        return $this->hasMany('App\General\Address');
    }

    public function tickets()
    {
        return $this->hasMany('App\General\Ticket');
    }

    public function reviews()
    {
        return $this->belongsToMany('App\Company\Company', 'reviews');
    }

    public function wishlists()
    {
        return $this->belongsToMany('App\Company\Company','wishlists');
    }

    public function reviewLikes()
    {
        return $this->belongsToMany('App\General\Review', 'comment_likes', 'review_id');
    }

    public function payments()
    {
        return $this->hasMany('App\General\Payment');
    }

    public function contacts()
    {
        return $this->hasMany('App\General\Contact');
    }

}

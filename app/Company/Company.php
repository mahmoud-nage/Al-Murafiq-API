<?php

namespace App\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{

    protected $table = 'companies';
    public $timestamps = true;

    use SoftDeletes;

    protected $casts = [
        'holiday' => 'array',
    ];

    protected $dates = ['deleted_at', 'open_to', 'open_from'];
    protected $fillable = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'service_ar', 'service_en', 'address_ar', 'address_en', 'pdf', 'branch_num', 'active', 'is_open', 'closed_reason', 'open_from', 'open_to', 'holiday', 'parent_id', 'phone1', 'phone2', 'tel', 'fax', 'facebook', 'instagram', 'twitter', 'snapshat', 'whatsapp', 'googleplus', 'website', 'email', 'visit_count', 'lat', 'lon', 'rate_user_count', 'total_rating','linked_in', 'country_id' , 'city_id', 'area_id', 'zone_id', 'app');
    // protected $visible = array('name_ar', 'name_en', 'desc_ar', 'desc_en', 'service_ar', 'service_en', 'address_ar', 'address_en', 'pdf', 'branch_num', 'active', 'is_open', 'closed_reason', 'open_from', 'open_to', 'holiday', 'parent_id', 'phone1', 'phone2', 'tel', 'fax', 'facebook', 'instagram', 'twitter', 'snapshat', 'whatsapp', 'googleplus', 'website', 'email', 'visit_count', 'lat', 'lon', 'rate_user_count', 'total_rating', 'linked_in', 'country_id' , 'city_id', 'area_id', 'zone_id', 'app');

    public function branches()
    {
        return $this->hasMany('App\Company\Company', 'parent_id', 'id')->where('parent_id', $this->id);
    }

    public function company()
    {
        return $this->belongsTo('App\Company\Company', 'parent_id', 'id');
    }

    public function payments()
    {
        return $this->hasManyThrough('App\General\Payment', 'App\User', 'userable_id');
    }

    public function affilates()
    {
        return $this->belongsToMany('App\Affilate\Affilate', 'affilate_companies');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function reviews()
    {
        return $this->hasMany('App\General\Review', 'company_id', 'id')->with('user');
    }

    public function wishlists()
    {
        return $this->hasMany('App\General\Wishlist', 'company_id', 'id')->with('user');
    }

    public function CompanySubsriptions()
    {
        return $this->hasMany('App\General\CampanySubsriptions', 'company_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\General\Category', 'compay_categories');
    }

    public function ads()
    {
        return $this->hasMany('App\General\Ad');
    }

    public function file()
    {
        return $this->morphOne('App\General\File', 'fileable');
    }

}

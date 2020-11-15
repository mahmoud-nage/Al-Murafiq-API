<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model 
{

    protected $table = 'subscriptions';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'price', 'days', 'active', 'desc_ar', 'desc_en', 'top', 'slider_num', 'banner_num', 'total_company');
    // protected $visible = array('name_ar', 'name_en', 'price', 'days', 'active', 'desc_ar', 'desc_en', 'top', 'slider_num', 'banner_num', 'total_company');

    public function companies()
    {
        return $this->belongsToMany('App\Company\Company', 'company_subsriptions');
    }

    public function ads()
    {
        return $this->belongsToMany('App\Company\Company', 'ads', 'company_id');
    }

}
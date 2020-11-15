<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ad extends Model
{

    protected $table = 'ads';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('company_id', 'subscription_id', 'company_subsription_id', 'image', 'top', 'type', 'ad_location', 'url', 'visit_count');
    // protected $visible = array('company_id', 'subscription_id', 'company_subsription_id', 'image', 'top', 'type', 'ad_location', 'url', 'visit_count');

    public function companySubsriptions()
    {
        return $this->belongsTo('App\General\CompanySubsriptions', 'company_subsription_id');
    }

    public function subscription()
    {
        return $this->belongsTo('App\General\Subscription', 'subscription_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company\Company', 'company_id');
    }
}

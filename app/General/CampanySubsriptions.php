<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampanySubsriptions extends Model 
{

    protected $table = 'company_subsriptions';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'from', 'to'];
    protected $fillable = array('company_id', 'subscription_id', 'from', 'to', 'price', 'slider_num', 'banner_num', 'payment_id');
    // protected $visible = array('company_id', 'subscription_id', 'from', 'to', 'price', 'slider_num', 'banner_num', 'payment_id');

    public function ads()
    {
        return $this->hasMany('App\General\Ad');
    }

    
    public function subscription()
    {
        return $this->belongsTo('App\General\Subscription', 'subscription_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company\Company', 'company_id');
    }

    public function payment()
    {
        return $this->belongsTo('App\General\Payment', 'payment_id');
    }

}
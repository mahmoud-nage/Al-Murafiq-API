<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{

    protected $table = 'payments';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'payment_method_id', 'company_subsription_id', 'amount', 'payment_details', 'payment_status');
    // protected $visible = array('user_id', 'payment_method_id', 'company_subsription_id', 'amount', 'payment_details', 'payment_status');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\General\PaymentMethod', 'payment_method_id');
    }

    public function file()
    {
        return $this->morphOne('App\General\File', 'fileable');
    }

}

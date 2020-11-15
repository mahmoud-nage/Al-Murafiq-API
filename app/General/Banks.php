<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banks extends Model
{

    protected $table = 'banks';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('bank_name_ar', 'bank_name_en', 'branch_name_ar', 'branch_name_en', 'owner_name_ar', 'owner_name_en', 'account_num', 'swift_num', 'logo', 'active');
    // protected $visible = array('bank_name_ar', 'bank_name_en', 'branch_name_ar', 'branch_name_en', 'owner_name_ar', 'owner_name_en', 'account_num', 'swift_num', 'logo', 'active');
}

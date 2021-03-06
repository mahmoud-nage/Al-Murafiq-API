<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffilateCompany extends Model 
{

    protected $table = 'affilate_companies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('company_id', 'affilate_id');
    // protected $visible = array('company_id', 'affilate_id');

}
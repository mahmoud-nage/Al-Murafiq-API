<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompayCategory extends Model 
{

    protected $table = 'compay_categories';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('company_id', 'category_id');
    // protected $visible = array('company_id', 'category_id');

}
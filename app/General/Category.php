<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'slug', 'active', 'in_home', 'parent_id', 'type');
    // protected $visible = array('name_ar', 'name_en', 'slug', 'active', 'in_home', 'parent_id', 'type');

    public function subcategories()
    {
        return $this->hasMany('App\General\Category','parent_id', 'id')->where('parent_id', $this->id);
    }
    public function subSubcategories()
    {
        return $this->hasMany('App\General\Category','parent_id', 'id')->where('parent_id', $this->id);
    }
    public function category()
    {
        return $this->belongsTo('App\General\Category','parent_id', 'id')->where('type', 0);
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company\Company', 'compay_categories');
    }

    public function files()
    {
        return $this->morphMany('App\General\File', 'fileable');
    }

}

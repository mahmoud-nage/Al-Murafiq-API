<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model 
{

    protected $table = 'files';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('fileable_id', 'fileable_type', 'source', 'type');
    // protected $visible = array('fileable_id', 'fileable_type', 'source', 'type');

    public function fileable()
    {
        return $this->morphTo();
    }

}
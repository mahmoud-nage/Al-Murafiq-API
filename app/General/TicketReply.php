<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketReply extends Model
{

    protected $table = 'ticket_replies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('ticket_id', 'user_id', 'reply');
    // protected $visible = array('ticket_id', 'user_id', 'reply');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function ticket()
    {
        return $this->belongsTo('App\General\Ticket', 'ticket_id');
    }

}

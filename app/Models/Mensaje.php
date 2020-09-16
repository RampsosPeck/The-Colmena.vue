<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = ['sender_id','recipient_id','body'];

    public function sender()
    {
    	return $this->belongsTo(User::class, 'sender_id');
    }

}

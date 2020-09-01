<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable=[
        'room_id','login_id','name','comment'
    ];

    protected $guarded = [
        'create_at','update_at'
    ];
}

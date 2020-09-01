<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wtpeople extends Model
{
    //
    protected $fillable=[
        'login_id','status','room_id'
        ];
    
        protected $guarded = [
            'create_at','update_at'
        ];
}

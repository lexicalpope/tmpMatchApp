<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Wtpeople;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TmppController extends Controller
{
    public function ilogin(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // 認証に成功した
            return ['ok'];
        }
        return ['no'];
    }
}

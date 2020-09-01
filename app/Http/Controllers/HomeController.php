<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Wtpeople;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = Comment::get();
        return view('home',['comments' => $comments]);


    }

    public function add(Request $request){
        $user = Auth::user();
        $comment = $request->input('comment');
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment
        ]);
        
        return redirect()->route('home');
    }

    

    public function goMatchRow(Request $request){
        $user = Auth::user();
        Wtpeople::create([
            'login_id' => $user->id,
            'status' => 1,
            'room_id' => -1,
        ]
        );
        $matchs = Wtpeople::orderBy('created_at', 'desc')->get();
    $json = ["matchs" => $matchs];
    return [1, 2, 3];
    }

    public function byeMatchRow(Request $request){
        $user = Auth::user();
        Wtpeople::where('login_id',$user->id)->update(['status'=>2]);
        $matchs = Wtpeople::orderBy('created_at', 'desc')->get();
    $json = ["matchs" => $matchs];
    return [22, 22, 22];
    }



    public function getMatch(Request $request)
    {
    $user = Auth::user();
    $tmpdata = Wtpeople::orderBy('created_at', 'desc')->where('login_id',$user->id)
    ->take(1)->get();
    $json = ["status" => $tmpdata];
    return response()->json($json);
    }

    public function getMessage(Request $request)
    {
        $user = Auth::user();
        $tmproom_id = $request->input('roomid');
        $tmpdata = Comment::orderBy('created_at', 'desc')->where('room_id',$tmproom_id)->get(['name','comment','created_at']);
        $json = ["message" => $tmpdata];
        return response()->json($json);
    }

/*
public function getMessage(Request $request)
{
    $user = Auth::user();
    $tmproom_id = 37;
    $tmpdata = Comment::orderBy('created_at', 'desc')->where('room_id',$tmproom_id)->get();
    $json = ["message" => $tmpdata];
    return response()->json($json);
}
*/

public function sendMessage(Request $request)
{
    
    $user = Auth::user();
    $tmproom_id = $request->input('roomid');
    $comment = $request->input('message');
    //$comment=$request->location;
    Comment::create([
        'room_id' => $tmproom_id,
        'login_id' => $user->id,
        'name' => $user->name,
        'comment' => $comment,
    ]);
    
    return ['ok'];
}

    public function fillRoomId(Request $request){
    $twodata = Wtpeople::orderBy('created_at', 'asc')->where('status',1)->take(2)->get();
    if(count($twodata)==2){
    $rnum=100;
    foreach ($twodata as $tmpdata){
    $tmpdata->roomid=$rnum;
    }
    }
    
    $json = ["matchs" => $matchs];
    return [22, 22, 22];
    }



}

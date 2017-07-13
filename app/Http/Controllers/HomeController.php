<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use Auth;
use Validator;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(['id','name','status'])->where('id', '!=', Auth::id());
        $messages = Messages::all();
        return view('home',compact('users','messages'));
    }

    public function getMessage(){

    }

    public function setMessage(Request $request){

        $user = Auth::user();
        
        Messages::create([
        'from'=>$user->id,
        'message'=>$request['message'],
        'to'=>$request['to']
        ]);

        $to = $request['to'];
        $to_user = User::find($to);
        $to_name = $to_user->name;
        $user = Auth::user();
        $from = $user->id;
        $from_name = $user->name;
        $message = Messages::where(function ($query) use ($from,$to) {
                            $query->where('from', '=', $from)
                                  ->Where('to', '=', $to);
                        })->orWhere(function ($query) use ($from,$to){
                            $query->where('from', '=', $to)
                                  ->where('to', '=', $from);
                        })->get();

        return view('message._chathistory',compact('to','message','from_name','to_name'))->render();                        
        
    }

    public function getChatHistory(){
        $to = $_GET['id'];
        $to_user = User::find($to);
        $to_name = $to_user->name;
        $user = Auth::user();
        $from = $user->id;
        $from_name = $user->name;
        $message = Messages::where(function ($query) use ($from,$to) {
                            $query->where('from', '=', $from)
                                  ->Where('to', '=', $to);
                        })->orWhere(function ($query) use ($from,$to){
                            $query->where('from', '=', $to)
                                  ->where('to', '=', $from);
                        })->get();

        return view('message._chathistory',compact('to','message','from_name','to_name'))->render();                        

    }
}

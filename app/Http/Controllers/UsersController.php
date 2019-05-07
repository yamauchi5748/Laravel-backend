<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserMoneysController;
use App\User;
use App\UserFollow;

class UsersController extends Controller
{
    protected $users;
    
    public function index()
    {
        $this->users = User::all();
        return $this->users;
    }

    public function get($user_id){
        $this->users = User::select('users.id', 'users.name', 'users.icon_path', 'users.born_at', 'users.gender')
        ->where('users.id', $user_id)
        ->first();

        $money = User::select('user_moneys.money')
        ->join('user_moneys','users.id','=','user_moneys.user_id')
        ->where('user_moneys.user_id', $user_id)
        ->first();

        $following_count = User::select('users.id')
        ->join('user_follows','users.id','=','user_follows.user_id')
        ->withCount('UserFollow')
        ->where('user_follows.user_id', $user_id)
        ->first();

        $followed_count = User::select('users.id')
        ->join('user_follows','users.id','=','user_follows.following_user_id')
        ->withCount('UserFollow')
        ->where('following_user_id', $user_id)
        ->first();

        if($following_count != null){
            $this->users->following_count = $following_count->user_follow_count;    
        }else{
            $this->users->following_count = 0;
        }
        if($following_count != null){
            $this->users->followed_count = $followed_count->user_follow_count;    
        }else{
            $this->users->followed_count = 0;
        }
        if($money != null){
            $this->users->money = $money->money;
        }
        
        $year = substr($this->users->born_at, 0 , 4);  
        $month = substr($this->users->born_at, 5 , 2);
        $day = substr($this->users->born_at, 8 , 2);
        $this->users->born_at = $year . '-' . $month . '-' . $day;

        return $this->users;
    }

    public function register(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->token = str_random(10);
        $user->hash_id = 11; //$request->hash_id;
        $user->icon_path = 'default'; //$request->icon_path;

        if($request->gender == 'man'){
            $user->gender = true;
        }else{
            $user->gender = false;
        }

        //born_atに整形
        $year = $request->year;
        $month = $request->month;
        $day = $request->day;
        $user->born_at = $year ."-" . $month . "-" . $day . " 00:00:00";
    
        $user->save();

        $um = new UserMoneysController();
        $um->user_money_post(User::count());

        return "done";
    }

    public function update($user_id, Request $request){
        $this->users = User::get()
        ->where('id', $user_id)
        ->first();
        if(false){
            // ユーザー認証
        }

        // 更新データのチェック
        $done = false;
        if($request->name != null){
            $this->users->name = $request->name;
            $done = true;
        }
        if($request->email != null){
            $this->users->email = $request->email;
            $done = true;
        }
        if($request->password != null){
            $this->users->password = Hash::make($request->password);
            $done = true;
        }
        if($request->icon_file_name != null){
            $this->users->icon_path = $request->icon_file_name;
            $done = true;
        }

        if($done){
            return "done";
        }else{
            return "false";
        }
    }
}

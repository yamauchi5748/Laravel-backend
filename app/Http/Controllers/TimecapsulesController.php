<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timecapsule;
use App\UserTimecapsule;
use App\UserTimecapsulegood;
use App\TimecapsuleFile;

class TimecapsulesController extends Controller
{
    protected $timecapsules;

    /**
     *　投稿をdisplay_typeに応じて取得する
    **/
    public function index($user_id, $display_type)
    {   
        if($display_type == 1){
            $this->timecapsules = Timecapsule::select('timecapsules.id', 'user_timecapsules.user_id', 'users.name',
            'users.icon_path', 'timecapsules.age', 'timecapsules.money')
            ->join('user_timecapsules','timecapsules.id','=','user_timecapsules.timecapsule_id')
            ->join('users','users.id','=','user_timecapsules.user_id')
            ->withCount('UserTimecapsulegood')
            ->orderBy('user_timecapsulegood_count', 'desc')
            ->get();

            foreach($this->timecapsules as $timecapsules){  
                $timecapsule = TimecapsuleFile::select('timecapsule_files.file_path', 'timecapsule_files.order_number')
                ->where('timecapsule_id', $timecapsules->id)
                ->take(3)
                ->get();
                
                $timecapsules->items = $timecapsule;
            }

        }else {
            $this->timecapsules = Timecapsule::select('timecapsules.id', 'user_timecapsules.user_id', 'users.name',
            'users.icon_path', 'timecapsules.age', 'timecapsules.money')
            ->join('user_timecapsules','timecapsules.id','=','user_timecapsules.timecapsule_id')
            ->join('users','users.id','=','user_timecapsules.user_id')
            ->withCount('UserTimecapsulegood')
            ->orderBy('user_timecapsulegood_count', 'desc')
            ->get();

            foreach($this->timecapsules as $timecapsules){  
                $timecapsule = TimecapsuleFile::select('timecapsule_files.file_path', 'timecapsule_files.order_number')
                ->where('timecapsule_id', $timecapsules->id)
                ->take(3)
                ->get();
                
                $timecapsules->items = $timecapsule;
            }
        }
        
        return $this->timecapsules;
    }

    /**
     *　投稿を年代指定で取得
    **/
    public function search(Request $request)
    {
        $this->timecapsules = Timecapsule::select('timecapsules.id', 'user_timecapsules.user_id', 'users.name',
        'users.icon_path', 'timecapsules.age', 'timecapsules.money')
        ->join('user_timecapsules','timecapsules.id','=','user_timecapsules.timecapsule_id')
        ->join('users','users.id','=','user_timecapsules.user_id')
        ->withCount('UserTimecapsulegood')
        ->whereBetween('timecapsules.age', array($request->start, $request->end))
        ->get();

        foreach($this->timecapsules as $timecapsules){  
            $timecapsule = TimecapsuleFile::select('timecapsule_files.file_path', 'timecapsule_files.order_number')
            ->where('timecapsule_id', $timecapsules->id)
            ->take(3)
            ->get();
                
           $timecapsules->items = $timecapsule;
        }

        return $this->timecapsules;
    }

    /**
     *　ユーザidを指定して投稿を取得
    **/
    public function user_timecapsule_get($user_id){
        $this->timecapsules = Timecapsule::select('timecapsules.id', 'user_timecapsules.user_id', 'users.name',
        'users.icon_path', 'timecapsules.age', 'timecapsules.money')
        ->join('user_timecapsules','timecapsules.id','=','user_timecapsules.timecapsule_id')
        ->join('users','users.id','=','user_timecapsules.user_id')
        ->withCount('UserTimecapsulegood')
        ->where('user_timecapsules.user_id', $user_id)
        ->get();

        foreach($this->timecapsules as $timecapsules){  
            $timecapsule = TimecapsuleFile::select('timecapsule_files.file_path', 'timecapsule_files.order_number')
            ->where('timecapsule_id', $timecapsules->id)
            ->get();
            
            $timecapsules->items = $timecapsule;
        }

        if($this->timecapsules != null){
            return $this->timecapsules;
        }else{
            return "false";
        }
    }


    /**
     *　投稿idを指定して投稿を取得
    **/
    public function get($timecapsule_id){
        $this->timecapsules = Timecapsule::select('timecapsules.id', 'user_timecapsules.user_id', 'users.name',
        'users.icon_path', 'timecapsules.age', 'timecapsules.money')
        ->join('user_timecapsules','timecapsules.id','=','user_timecapsules.timecapsule_id')
        ->join('users','users.id','=','user_timecapsules.user_id')
        ->withCount('UserTimecapsulegood')
        ->where('timecapsules.id', $timecapsule_id)
        ->first();
     
        $timecapsule = TimecapsuleFile::select('timecapsule_files.file_path', 'timecapsule_files.order_number')
        ->where('timecapsule_id', $timecapsule_id)
        ->get();
        
        $this->timecapsules->items = $timecapsule;
        

        if($this->timecapsules != null){
            return $this->timecapsules;
        }else{
            return "false";
        }
    }

    /**
     *　タイムカプセルを投稿する
    **/
    public function post($user_id, Request $request){
        $timecapsule = new Timecapsule();
        $user_timecapsule = new UserTimecapsule();

        //timecapsule_idをDBから計算
        $timecapsule_id = (Timecapsule::get()->count() + 1);

        $timecapsule->money = 30;
        $timecapsule->age = $request->age;
        if($timecapsule->age == null){
            return "false";
        }

        $user_timecapsule->timecapsule_id = $timecapsule_id;
        $user_timecapsule->user_id = $user_id;

        foreach($request->items as $item){
            $timecapsule_file = new TimecapsuleFile();

            $timecapsule_file->timecapsule_id = $timecapsule_id;
            $timecapsule_file->file_path = $item->file_path;
            $timecapsule_file->order_number = $item->order_number;

            $timecapsule_file->save();
        }
        
        $timecapsule->save();
        $user_timecapsule->save();

        return "done";
    }
}

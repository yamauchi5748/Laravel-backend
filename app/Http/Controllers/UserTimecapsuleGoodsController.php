<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTimecapsulegood;

class UserTimecapsuleGoodsController extends Controller
{
    protected $user_timecapsule_goods;

    /**
     *　投稿に対するいいねを追加　
    **/
    public function post($timecapsule_id, $user_id)
    {   
        // リクエストパラメタのチェック
        if(($timecapsule_id != null) && ($user_id != null)){
            $this->user_timecapsule_goods = UserTimecapsulegood::where('timecapsule_id', $timecapsule_id)
            ->where('gooded_user_id', $user_id)    
            ->first();

            // 既にいいねをしていないかチェック
            if($this->user_timecapsule_goods == null){        
                $user_timecapsule_good = new UserTimecapsulegood();

                $user_timecapsule_good->timecapsule_id = $timecapsule_id;
                $user_timecapsule_good->gooded_user_id = $user_id;

                $user_timecapsule_good->save();
                return "done";
            }
        }

        return "false";
    }

    /**
     *　投稿に対するいいねを削除　
    **/
    public function delete($timecapsule_id, $user_id)
    {
        // リクエストパラメタのチェック
        if(($timecapsule_id != null) && ($user_id != null)){  
            $this->user_timecapsule_goods = UserTimecapsulegood::where('timecapsule_id', $timecapsule_id)
            ->where('gooded_user_id', $user_id)
            ->first();

            // いいねがされているかチェック
            if($this->user_timecapsule_goods != null){    
                $this->user_timecapsule_goods->delete();
                return "done";
            }
        }

        return "false";

    }

}

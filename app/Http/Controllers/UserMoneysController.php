<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserMoney;
use App\Timecapsule;
use App\UserTimecapsule;

class UserMoneysController extends Controller

{
    /**
     *  ユーザーのサービス内通貨を取得
     */
    public function get($user_id){

        // リクエストパラメタをチェック
        if($user_id != null){
            $user_money = UserMoney::select("money")
            ->where('user_id', $user_id)
            ->first();

            // moneyを持っているかチェック
            if($user_money != null){
                return $user_money->money;
            }
        }

        return "false";
    }

    /**
     *  ユーザーに対するサービス内通貨を追加
     */
    public function user_money_post($user_id){
        $user_money = new UserMoney();
        
        // リクエストパラメタをチェック
        if($user_id != null){
            $user_money->user_id = $user_id;
            $user_money->money = 100;

            $user_money->save();

            return true;
        }

        return false;
    }

    /**
     *  タイムカプセル購入によるサービス内通貨の更新
     */
    public function put($timecapsule_id, $user_id){
        
        // リクエストパラメタをチェック
        if($timecapsule_id != null && $user_id != null){
            // タイムカプセルの金額を取得
            $timecapsule_money = Timecapsule::where('id', $timecapsule_id)
            ->first();

            // ユーザのmoneyを取得
            $user_money = UserMoney::where('user_id', $user_id)
            ->first();
                
            // タイムカプセル投稿者のmoneyを取得
            $posted_user_money = UserMoney::select('user_moneys.*')
            ->join('user_timecapsules', 'user_moneys.user_id', '=', 'user_timecapsules.user_id')
            ->where('user_timecapsules.timecapsule_id', $timecapsule_id)
            ->first();

            // タイムカプセルの金額、ユーザとタイムカプセル投稿者のmoneyをチェック
            if($timecapsule_money != null && $user_money!= null && $posted_user_money != null){
                  $user_money->money = ($user_money->money - $timecapsule_money->money);
                  $posted_user_money->money = ($posted_user_money->money + $timecapsule_money->money);

                  $user_money->save();
                  $posted_user_money->save();

                  return "done";
            }
        }

        return "false";
    }
}
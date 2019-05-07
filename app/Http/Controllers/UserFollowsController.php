<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserFollow;

class UserFollowsController extends Controller
{
    /**
     * フォロー申請状況を取得
     */
    public function get($user_id){
        $users = array();
        $following_requests = array();
        
        // リクエストパラメタが指定されているかチェック
        if($user_id != null){
            // ユーザーに対するフォローリクエストを取得
            $following_requests = UserFollow::where('following_user_id', $user_id)
            ->get();

            // 相互フォローしていないユーザー情報だけを取得する
            foreach($following_requests as $following_request){
                // 相手ユーザーに対するユーザーのフォローリクエストを取得
                $followed_request = UserFollow::where('user_id', $user_id)
                ->where('following_user_id', $following_request->user_id)
                ->first();

                // ユーザーがフォローしていないユーザー情報を追加
                if($followed_request == null){
                    $user = User::select('users.id', 'users.name', 'users.icon_path')
                    ->where('users.id', $following_request->user_id)
                    ->first();
        
                    array_push($users, $user);
                }
            }
        }

        return $users;
    }   

    /**
     * 相互フォロー状態かチェック
     */
    public function follow_check($posted_user_id, $user_id){
        
        // リクエストパラメタが指定されているかチェック
        if($posted_user_id != null && $user_id != null){
            // ユーザーに対するフォローリクエストを取得
            $following_request = UserFollow::where('user_id', $posted_user_id)
            ->where('following_user_id', $user_id)
            ->first();

            // ユーザーに対するフォローリクエストをチェック
            if($following_request != null){
                // 相手ユーザーに対するユーザーのフォローリクエストを取得
                $followed_request = UserFollow::where('user_id', $user_id)
                ->where('following_user_id', $posted_user_id)
                ->first();

                //  相手ユーザーに対するユーザーのフォローリクエストをチェック
                if($followed_request != null){
                    return "done";
                }
            }
        }

        return "false";
    }

    /**
     * フォロー申請
     */
    public function post($user_id, $following_user_id){
        // リクエストパラメタが指定されているかチェック
        if($user_id != null && $following_user_id != null){    
            $user_follows = UserFollow::where('user_id', $user_id)
            ->where('following_user_id', $following_user_id)
            ->first();

            // 既にフォロー申請済みでないかチェック
            if($user_follows == null){  
                $user_follow = new UserFollow();

                $user_follow->user_id = $user_id;
                $user_follow->following_user_id = $following_user_id;
                
                $user_follow->save();

                return "done";
            }
        }

        return "false";
    } 
    
    /**
     * フォロー申請削除
     */
    public function delete($user_id, $followed_user_id){
        // リクエストパラメタが指定されているかチェック
        if($user_id != null && $followed_user_id != null){    
            $user_follow = UserFollow::where('user_id', $followed_user_id)
            ->where('following_user_id', $user_id)
            ->first();

            // フォロー申請が存在するかチェック
            if($user_follow != null){  
                
                $user_follow->delete();

                return "done";
            }
        }

        return "false";
    }   
}

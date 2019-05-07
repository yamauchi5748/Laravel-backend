<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Comment;

class CommentsController extends Controller
{
    /**
     *　投稿に対するコメントを取得
    **/
    public function get($timecapsule_id)
    {
        $comments = Comment::select('comments.id', 'comments.timecapsule_id', 'comments.posted_user_id', 
        'comments.comment_text', 'users.name', 'users.icon_path')
        ->join('users','users.id','=','comments.posted_user_id')
        ->where('comments.timecapsule_id', $timecapsule_id)
        ->get();
        
        return Response::json(
            ['comments' => $comments],
            200,
            [
                'Content-Type' => 'application/json',
            ],
            JSON_UNESCAPED_UNICODE);;
    }
    
    /**
     *　コメントを投稿する
    **/
    public function post($timecapsule_id, $user_id, Request $request){
        $comment = new Comment();

        if($timecapsule_id != null && $user_id != null && $request->target_user_id != null && $request->text != null){    
            $comment->timecapsule_id = $timecapsule_id;
            $comment->posted_user_id = $user_id;
            $comment->target_user_id = $request->target_user_id;
            $comment->comment_text = $request->text;

            $comment->save();

            return "done";
        }

        return "false";
    }

    /**
     *　コメントを削除する
    **/
    public function delete($comment_id){
        if($comment_id != null){    
            $comments = Comment::where('id', $comment_id)
            ->first();

            // コメントが存在するかチェック
            if($comments != null){    
                $comments->delete();
                return "done";
            }
        }

        return "false";
    }
}

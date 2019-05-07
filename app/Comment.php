<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'timecapsule_id', 'posted_user_id', 'target_user_id', 'comment_text'
    ];

    // テーブル名の指定
    protected $table = 'comments';

    // 主キーの指定
    protected $primaryKey = 'id';

    //TimecapsuleModelとの紐づけ
    public function Timecapsule()
    {
        return $this->belongsTo('App\Timecapsule');
    }

}

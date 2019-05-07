<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $fillable = [
        'id', 'user_id', 'following_user_id'
    ];
    
    // テーブル名の指定
    protected $table = 'user_follows';

    // 主キーの指定
    protected $primaryKey = 'id';

    //UserModelとの紐づけ
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

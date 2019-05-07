<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'icon_path', 'hash_id','token', 'gender', 'born_at'
    ];

    protected $guarded = [
        'id', 'email', 'password' 
    ];

    // テーブル名の指定
    protected $table = 'users';

    // 主キーの指定
    protected $primaryKey = 'id';

    //UserTimecapsuleModelとの紐づけ
    public function UserTimecapsule()
    {
        return $this->hasMany('App\UserTimecapsule');
    }

    //UserFollowModelとの紐づけ
    public function UserFollow()
    {
        return $this->hasMany('App\UserFollow');
    }

    //UserMoneyModelとの紐づけ
    public function userMoney()
    {
        return $this->hasMany('App\UserMoney');
    }

}

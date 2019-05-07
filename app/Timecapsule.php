<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timecapsule extends Model
{
    protected $fillable = [
        'id', 'age', 'money'
    ];

    // テーブル名の指定
    protected $table = 'timecapsules';

    // 主キーの指定
    protected $primaryKey = 'id';

    //CommentModelとの紐づけ
    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }

    //TimecapsuleFileModelとの紐づけ
    public function TimecapsuleFile()
    {
        return $this->hasMany('App\UserTimecapsuleFile');
    }

    //UserTimecapsuleModelとの紐づけ
    public function UserTimecapsule()
    {
        return $this->hasMany('App\UserTimecapsule');
    }

    //UserTimecapsuleGoodModelとの紐づけ
    public function UserTimecapsulegood()
    {
        return $this->hasMany('App\UserTimecapsulegood');
    }
}

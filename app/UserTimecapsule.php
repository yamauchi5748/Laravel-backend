<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTimecapsule extends Model
{
    protected $fillable = [
        'id', 'timecapsule_id', 'user_id'
    ];
    
    // テーブル名の指定
    protected $table = 'user_timecapsules';

    // 主キーの指定
    protected $primaryKey = 'id';

    //UserModelとの紐づけ
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    //TimecapsuleModelとの紐づけ
    public function Timecapsule()
    {
        return $this->belongsTo('App\Timecapsule');
    }
    
}




<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTimecapsulegood extends Model
{
    protected $fillable = [
        'id', 'timecapsule_id', 'gooded_user_id'
    ];
    
    // テーブル名の指定
    protected $table = 'user_timecapsule_goods';

    // 主キーの指定
    protected $primaryKey = 'id';

    //TimecapsuleModelとの紐づけ
    public function Timecapsule()
    {
        return $this->belongsTo('App\Timecapsule');
    }
    
}

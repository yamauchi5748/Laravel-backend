<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMoney extends Model
{
    protected $fillable = [
        'id', 'user_id', 'money'
    ];

    // テーブル名の指定
    protected $table = 'user_moneys';

    // 主キーの指定
    protected $primaryKey = 'id';

    //UserModelとの紐づけ
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

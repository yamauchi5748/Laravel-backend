<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimecapsuleFile extends Model
{
    protected $fillable = [
        'id', 'timecapsule_id', 'file_path', 'order_number'
    ];   
    
    // テーブル名の指定
    protected $table = 'timecapsule_files';

    // 主キーの指定
    protected $primaryKey = 'id'; 

    //TimecapsuleModelとの紐づけ
    public function Timecapsule()
    {
        return $this->belongsTo('App\Timecapsule');
    }
    
}

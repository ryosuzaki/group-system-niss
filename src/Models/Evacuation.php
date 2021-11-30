<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Info\Info;
use GroupSystem\Niss\Models\Rescue;

use App\User;

class Evacuation extends Model
{
    protected $table = 'group_system_niss_evacuations';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * 
     */
    public static function setUpInfo(Info $info){
        Rescue::create([
            "user_id"=>$info->model()->id,
            "info_id"=>$info->id,
        ]);
        return self::create([
            "user_id"=>$info->model()->id,
            "info_id"=>$info->id,
        ]);
    }

    /**
     * 
     */
    public static function findByUserId(int $user_id){
        return self::where("user_id",$user_id)->first();
    }

    /**
     * 
     */
    public static function findByInfoId(int $info_id){
        return self::where("info_id",$info_id)->first();
    }

    /**
     * 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}

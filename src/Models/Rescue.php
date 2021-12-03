<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Info\Info;
use App\User;

use Illuminate\Support\Facades\Auth;

class Rescue extends Model
{
    protected $table = 'group_system_niss_rescues';

    //
    protected $guarded = ['id'];

    //
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    //
    protected $attributes = [
        'rescue'=>'unrescue',
    ];


    /**
     * 
     */
    public static function findByUserId(int $user_id){
        return self::where("user_id",$user_id)->first();
    }

    /**
     * 
     */
    public static function findByInfoBaseId(int $info_base_id){
        return self::where("info_base_id",$info_base_id)->first();
    }

    /**
     * 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 
     */
    public function rescuer(){
        return $this->belongsTo(User::class);
    }

    /**
     * 
     */
    public function getRescuer(){
        return $this->rescuer()->first();
    }

    /**
     * 
     */
    public static function rescue(User $user){
        $rescue=self::findByUserId($user->id);
        if ($rescue->rescuer_id==null){
            return $rescue->fill([
                'rescue'=>'rescue',
                'rescuer_id'=>Auth::id(),
            ])->save();
        }else{
            return false;
        }
    }

    /**
     * 
     */
    public static function unrescue(User $user){
        $rescue=self::findByUserId($user->id);
        if ($rescue->rescuer_id==Auth::id()){
            return $rescue->fill([
                'rescue'=>'unrescue',
                'rescuer_id'=>null,
            ])->save();
        }else{
            return false;
        }
    }

    /**
     * 
     */
    public static function rescued(User $user){
        $rescue=self::findByUserId($user->id);
        if ($rescue->rescuer_id==Auth::id()){
            return $rescue->fill([
                'rescue'=>'rescued',
            ])->save();
        }else{
            return false;
        }
    }
}

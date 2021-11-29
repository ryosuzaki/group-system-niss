<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Info\InfoBase;

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
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function setUpInfo(InfoBase $info_base){
        return self::create([
            "user_id"=>$info_base->model()->id,
            "info_base_id"=>$info_base->id,
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
    public function setEditAttribute($value){
        $this->attributes['edit'] = serialize($value);
    }
    public function getEditAttribute($value){
        return unserialize($value);
    }

}

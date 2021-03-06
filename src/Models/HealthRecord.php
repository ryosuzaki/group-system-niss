<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Info\Info;

class HealthRecord extends Model
{
    protected $table = 'group_system_niss_health_records';

    //
    protected $guarded = ['id'];

    //
    protected $dates = [
        "created_at",
        "updated_at"
    ];
    //
    protected $casts = [
        'warui_bui' => 'array',
    ];
    //
    protected $attributes = [
        'feeling'=>'ćç­ăȘă',
        'comment'=>'',
        'syokuyoku'=>'',
        'otuzi'=>'',
        'taion'=>'',
        'taiju'=>'',
        'ketuatu_saikou'=>'',
        'ketuatu_saitei'=>'',
    ];
    
    public static function create(array $attributes = [])
    {
        if(!isset($attributes["warui_bui"])){
            $attributes["warui_bui"]=[];
        }
        
        $model = static::query()->create($attributes);
        return $model;
    }
    
    //
    public function getNotUseItemsAttribute(){
        return $this->getInfo()->info["not_use_items"];
    }
    //
    public function setNotUseItemsAttribute(array $items=[]){
        return $this->getInfo()->partlyUpdateInfo(["not_use_items"=>$items]);
    }

    /**
     * 
     */
    public static function infoConstructor(Info $info){
        return self::create([
            "user_id"=>$info->model()->first()->id,
            "info_id"=>$info->id,
        ]);
    }

    /**
     * 
     */
    public function updateRecord(array $attributes){
        foreach($attributes as $key=>$item){
            if(!isset($item)){
                unset($attributes[$key]);
            }
        }
        $record=$this->getTodayRecord();
        return $record->fill($attributes)->save();
    }

    /**
     * 
     */
    public static function findByUserId(int $user_id){
        return self::where("user_id",$user_id)->latest()->first();
    }

    /**
     * 
     */
    public static function findByInfoId(int $info_id){
        return self::where("info_id",$info_id)->latest()->first();
    }

    /**
     * 
     */
    public function getTodayRecord(){
        $record=self::findByInfoId($this->info_id);
        if($record->created_at->format('Y-m-d')==date('Y-m-d')){
            return $record;
        }else{
            return self::create([
                'user_id'=>$record->user_id,
                'info_id'=>$record->info_id,
            ]);
        }
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
    public function info(){
        return $this->belongsTo(Info::class);
    }

    /**
     * 
     */
    public function getInfo(){
        return $this->info()->first();
    }
}

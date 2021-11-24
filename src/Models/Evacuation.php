<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Evacuation extends Model
{
    protected $table = 'group_system_niss_evacuations';

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

    
    

}

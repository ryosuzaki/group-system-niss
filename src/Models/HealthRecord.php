<?php

namespace GroupSystem\Niss\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class HealthRecord extends Model
{
    protected $table = 'group_system_niss_health_records';

    /**
     * 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

}

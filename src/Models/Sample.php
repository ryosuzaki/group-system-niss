<?php

namespace GroupSystem\Sample\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    public static function getSample(){
        return Sample::orderBy('id')->first();
    }
}

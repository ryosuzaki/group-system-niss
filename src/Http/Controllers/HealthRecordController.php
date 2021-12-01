<?php

namespace GroupSystem\Niss\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GroupSystem\Niss\Models\HealthRecord;

use Illuminate\Support\Facades\Auth;

use Validator;

class HealthRecordController extends Controller
{   
    /**
     * 
     */
    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user=Auth::user();
        $record=HealthRecord::findByUserId($user->id);
        $record->updateRecord([
            
        ]);
        return redirect()->route('user.show');
    }
}

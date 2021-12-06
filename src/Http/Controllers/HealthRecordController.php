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
            'feeling'=>$request->feeling,
            'comment'=>$request->comment,
            'syokuyoku'=>$request->syokuyoku,
            'otuzi'=>$request->otuzi,
            'taion'=>$request->taion,
            'taiju'=>$request->taiju,
            'ketuatu_saikou'=>$request->ketuatu_saikou,
            'ketuatu_saitei'=>$request->ketuatu_saitei,
            'warui_bui' => $request->warui_bui,
        ]);
        return redirect()->route('user.show');
    }

    /**
     * 
     */
    public function setting(int $index){
        $user=Auth::user();
        $info=$user->getInfoByIndex($index);
        return view('group_system_niss::user.health_record.setting')->with(["user"=>$user,'info'=>$info,'not_use_items'=>$info->info["not_use_items"]]);
    }

    /**
     * 
     */
    public function updateSetting(Request $request,int $index){
        $validator = Validator::make($request->all(),[
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user=Auth::user();
        $info=$user->getInfoByIndex($index);
        $info->partlyUpdateInfo([
            'not_use_items'=>$request->not_use_items,
        ]);
        return redirect()->route('user.show');
    }
}

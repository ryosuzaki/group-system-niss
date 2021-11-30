<?php

namespace GroupSystem\Niss\Http\Controllers;

use App\Http\Controllers\Controller;

use GroupSystem\Niss\Models\Evacuation;

use App\Models\Info\Info;

class EvacuationController extends Controller
{   
    /**
     * 
     */
    public function update(Request $request,Info $info){
        $validator = Validator::make($request->all(),[
            'evacuation' => ['required', 'string', 'max:255'],
            'comment' => ['string','max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user=Auth::user();
        $evacuation=Evacuation::findByUserId($user->id);
        $evacuation->fill([
            'evacuation'=>$request['evacuation'],
            'comment'=>$request['comment'],
        ])->save();
        return redirect()->route('user.show');
    }
}

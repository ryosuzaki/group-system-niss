<?php

namespace GroupSystem\Niss\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GroupSystem\Niss\Models\Evacuation;

use Illuminate\Support\Facades\Auth;

use Validator;

class EvacuationController extends Controller
{   
    /**
     * 
     */
    public function update(Request $request){
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

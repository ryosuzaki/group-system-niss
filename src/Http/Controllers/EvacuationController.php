<?php

namespace GroupSystem\Niss\Http\Controllers;

use App\Http\Controllers\Controller;

use GroupSystem\Niss\Models\Evacuation;

class EvacuationController extends Controller
{   
    //
    public function index()
    {
        $sample=Sample::getSample();
        //info($sample);
        return view('group_system_sample::index')->with(['sample'=>$sample]);
    }
    
    /**
     * 
     */
    public function update(Request $request){
        $user=Auth::user();
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users','email')->ignore($user)],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user->fill([
            'name'=>$request['name'],
            'email'=>$request['email'],
        ])->save();
        return redirect()->route('user.show');
    }

    /**
     * 
     */
    
}

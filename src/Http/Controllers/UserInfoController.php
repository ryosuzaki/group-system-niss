<?php

namespace GroupSystem\Sample\Http\Controllers;

use App\Http\Controllers\Controller;

use GroupSystem\Sample\Models\Sample;

class SampleController extends Controller
{   
    //
    public function index()
    {
        $sample=Sample::getSample();
        //info($sample);
        return view('group_system_sample::index')->with(['sample'=>$sample]);
    }
}

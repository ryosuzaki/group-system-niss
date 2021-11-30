<?php

namespace GroupSystem\Niss\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Group\Group;
use App\User;
use GroupSystem\Niss\Models\Rescue;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class RescueController extends Controller
{
    private $template_name="niss/rescue";
    //
    public function rescue(Group $group,User $user){
        Rescue::rescue($user);
        $info=$group->getInfoByTemplate($template_name);
        return response()->view($info->getTemplate()->view["show"]["path"], ['info'=>$info,'group'=>$group]);
    }
    //
    public function unrescue(Group $group,User $user){
        Rescue::unrescue($user);
        $info=$group->getInfoByTemplate($template_name);   
        return response()->view($info->getTemplate()->view["show"]["path"], ['info'=>$info,'group'=>$group]);
    }
    //
    public function rescued(Group $group,User $user){
        Rescue::rescued($user);
        $info=$group->getInfoByTemplate($template_name);   
        return response()->view($info->getTemplate()->view["show"]["path"], ['info'=>$info,'group'=>$group]);
    }
    //
    public function reverseRescue(Group $group,User $user){
        Rescue::unrescue($user);
        $info=$group->getInfoByTemplate($template_name);   
        return response()->view($info->getTemplate()->view["show"]["path"], ['info'=>$info,'group'=>$group]);
    }
}

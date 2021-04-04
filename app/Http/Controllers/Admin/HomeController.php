<?php

namespace App\Http\Controllers\Admin;

use App\Master;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index(){
        return view('admin.home');
    }
    public function general_notification(Request $request){
        $Title = $request->has('title')?$request->title:'';
        $Message = $request->has('msg')?$request->msg:'';
        $Users = new User();
        if($request->has('type') && $request->type == 1)
            $Users = $Users->where('type',1);
        if($request->has('type') && $request->type == 2)
            $Users = $Users->where('type',2);
        if($request->has('type') && $request->type == 3)
            $Users = $Users->where('type',3);

        foreach ($Users->get() as $user){
            if($user->device_token != null)
                Master::sendNotification($user->id,$user->device_token,$Title,$Message,null,0);
        }
        return redirect()->back()->with('status', __('admin.messages.notification_sent'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Master;
use App\Models\Auth\Admin;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index(){
        session(['my_locale' => 'ar']);
        App::setLocale(session('my_locale'));

        return view('welcome');
    }
    public function lang(){
        if(session('my_locale','en') =='en'){
            session(['my_locale' => 'ar']);
        }else{
            session(['my_locale' => 'en']);
        }
        App::setLocale(session('my_locale'));
        return redirect()->back();
    }
    public function certifications(Request $request){
        session(['my_locale' => 'ar']);
        App::setLocale(session('my_locale'));

        $Name = Certification::where('civil_registry',@$request->civil_registry)->first();
        if(!$Name)
            return redirect()->back()->withErrors(__('لاتوجد بيانات، يرجى التأكد من السجل المدني'));
        $Objects = Certification::where('civil_registry',@$request->civil_registry)->orderBy('category_id','desc')->get();
        return view('certifications',compact('Objects','Name'));
    }
    public function download_certification($id){
        $Objects = Certification::find($id);
        $Objects = [
            'civil_registry'=>$Objects->civil_registry,
            'name'=>Master::replace_special_char($Objects->name),
            'category_name'=>$Objects->category->name,
            'signature'=>$Objects->category->signature,
            'image'=>$Objects->category->image,
            'show_identity'=>$Objects->category->show_identity,
            'signature_name'=>$Objects->category->getSignatureName(),
            'stamp'=>$Objects->category->stamp,
            'line_one'=>$Objects->category->getLineOne(),
            'line_two'=>$Objects->category->getLineTwo(),
            'line_three_1'=>$Objects->category->getLineThree1(),
            'line_three_2'=>$Objects->category->getLineThree2(),
            'line_three_3'=>$Objects->category->getLineThree3(),
            'line_four'=>$Objects->category->getLineFour(),
            'line_five'=>$Objects->category->getLineFive(),
            'line_six_1'=>$Objects->category->getLineSix1(),
            'line_six_2'=>$Objects->category->getLineSix2(),
            'line_seven_1'=>$Objects->category->getLineSeven1(),
            'line_seven_2'=>$Objects->category->getLineSeven2(),
            'line_eight_1'=>$Objects->category->getLineEight1(),
            'line_eight_2'=>$Objects->category->getLineEight2(),
        ];
        if($Objects){
            Master::exportMPDF($Objects,'certification','Certification','L');
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}

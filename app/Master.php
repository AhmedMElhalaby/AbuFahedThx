<?php


namespace App;


use Barryvdh\DomPDF\Facade as PDF;

use Mpdf\MpdfException;

class Master
{
    const CategoryTypes = ['TrainingCert'=>1,'ThankingCert'=>2];
    const CategoryTypesRules = '1,2';
    public static function NiceNames($Model){
        switch ($Model){
            case 'User':
                return [
                    'name'=>__('names.users.name'),
                    'email'=>__('names.users.email'),
                    'password'=>__('names.users.password'),
                    'mobile'=>__('names.users.mobile'),
                    'type'=>__('names.users.type'),
                    'image'=>__('names.users.image'),
                ];
            case 'Facilities':
                return [
                    'name'=>__('names.facilities.name'),
                    'facility_type_id'=>__('names.facilities.facility_type_id'),
                    'website'=>__('names.facilities.website'),
                    'email'=>__('names.facilities.email'),
                    'phone'=>__('names.facilities.phone'),
                    'phone2'=>__('names.facilities.phone2'),
                    'address'=>__('names.facilities.address'),
                    'location'=>__('names.facilities.location'),
                    'logo'=>__('names.facilities.logo'),
                    'license_copy'=>__('names.facilities.license_copy'),
                    'commercial_register_copy'=>__('names.facilities.commercial_register_copy'),
                    'civil_defense_copy'=>__('names.facilities.civil_defense_copy'),
                    'civil_defense_map'=>__('names.facilities.civil_defense_map'),
                    'facility_map'=>__('names.facilities.facility_map'),
                    'gd_name'=>__('names.facilities.gd_name'),
                    'gd_email'=>__('names.facilities.gd_email'),
                    'gd_phone'=>__('names.facilities.gd_phone'),
                    'gd_phone2'=>__('names.facilities.gd_phone2'),
                    'md_name'=>__('names.facilities.md_name'),
                    'md_email'=>__('names.facilities.md_email'),
                    'md_phone'=>__('names.facilities.md_phone'),
                    'md_phone2'=>__('names.facilities.md_phone2'),
                    'start_time'=>__('names.facilities.start_time'),
                    'end_time'=>__('names.facilities.end_time'),
                    'em_start_time'=>__('names.facilities.em_start_time'),
                    'em_end_time'=>__('names.facilities.em_end_time'),
                ];
            case 'Doctor':
                return [
                    'name'=>__('names.users.name'),
                    'email'=>__('names.users.email'),
                    'password'=>__('names.users.password'),
                    'mobile'=>__('names.users.mobile'),
                    'image'=>__('names.users.image'),
                    'gender'=>__('names.users.gender'),
                    ];
            case 'Order':
                return [
                    'name1'=>__('names.users.name'),
                    'email'=>__('names.users.email'),
                    'password'=>__('names.users.password'),
                    'mobile'=>__('names.users.mobile'),
                    'image'=>__('names.users.image'),
                    'gender'=>__('names.users.gender'),
                    ];
            default :
                return [];
        }

    }
    public static function Upload($attribute_name, $destination_path,$value = null){
        $destination_path = "public/".$destination_path;

        if($value){
            // 1. Generate a new file name
            $file = $value;
            $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            // 2. Move the new file to the correct path
            $file_path = $file->move($destination_path, $new_file_name);
            // 3. Save the complete path to the database
            return $destination_path.$new_file_name;
        }
        else{
            $request = \Request::instance();
            // if a new file is uploaded, store it on disk and its filename in the database
            if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
                // 1. Generate a new file name
                $file = $request->file($attribute_name);
                $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                // 2. Move the new file to the correct path
                $file_path = $file->move($destination_path, $new_file_name);
                // 3. Save the complete path to the database
                return $destination_path.$new_file_name;
            }
            return false;
        }
    }
    public static function MultiUpload($attribute_name, $destination_path,$ref_id,$type){
        $request = \Request::instance();
        $destination_path = "public/".$destination_path.'/';

        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name)) {
            $file = $request->file($attribute_name);

            if(is_array($file)){
                foreach ($file as $item){
                    // 1. Generate a new file name
                    $new_file_name = md5($item->getClientOriginalName().time()).'.'.$item->getClientOriginalExtension();
                    // 2. Move the new file to the correct path
                    $file_path = $item->move($destination_path, $new_file_name);
                    // 3. Save the complete path to the database
                    Gallery::create(array('ref_id'=>$ref_id,'image'=>$destination_path.$new_file_name,'type'=>$type));
                }
                return true;
            }else{
                // 1. Generate a new file name
                $file = $request->file($attribute_name);
                $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                // 2. Move the new file to the correct path
                $file_path = $file->move($destination_path, $new_file_name);
                // 3. Save the complete path to the database
                return $destination_path.$new_file_name;
            }
        }
        return false;
    }
    public static function exportMPDF($Objects, $view, $names,$orientation ='P',  $save = false, $path = '')
    {
        $html = view($view, compact('Objects', 'names'))->render();

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        try {
            $mpdf = new \Mpdf\Mpdf([
                'tempDir' => __DIR__ . '/tmp',
                'orientation' => $orientation,
                'setAutoTopMargin' => 'stretch',
                'autoMarginPadding' => 0,
                'bleedMargin' => 0,
                'crossMarkMargin' => 0,
                'cropMarkMargin' => 0,
                'nonPrintMargin' => 0,
                'margBuffer' => 0,
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'margin_header' => 0,
                'margin_footer' => 0,
                'fontDir' => array_merge($fontDirs, [
                    __DIR__ . '/tmp/ttfontdata',
                ]),
//
//                'fontdata' => $fontData + [
//                        'osama' => [
//                            'R' => 'osama.ttf',
//                            'useOTL' => 0xFF,
//                            'useKashida' => 75,
//
//                        ]
//                    ],
//                'default_font' => 'osama',
//                'fontdata' => $fontData + [
//                        'ptbldhad' => [
//                            'R' => 'ptbldhad.ttf',
//                            'useOTL' => 0xFF,
//                            'useKashida' => 75,
//
//                        ]
//                    ],
//                'default_font' => 'ptbldhad',
                'fontdata' => $fontData + [
                        'droidkufiregular' => [
                            'R' => 'droidkufiregular.ttf',
                            'useOTL' => 0xFF,
                            'useKashida' => 75,
                        ],
                        'almohanad' => [
                            'R' => 'almohanad.ttf',
                            'useOTL' => 0xFF,
                            'useKashida' => 75,
                        ],
                        'osama' => [
                            'R' => 'osama.ttf',
                            'useOTL' => 0xFF,
                            'useKashida' => 75,
                        ]
                    ],
                'default_font' => 'droidkufiregular',
//                'fontdata' => $fontData + [
//                        'almohanad' => [
//                            'R' => 'almohanad.ttf',
//                            'useOTL' => 0xFF,
//                            'useKashida' => 75,
//
//                        ]
//                    ],
//                'default_font' => 'almohanad'
//                'default_font' => 'KFGQPCUthmanTahaNaskh'

            ]);

            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($names);
            $mpdf->autoScriptToLang = true;
            $mpdf->baseScript = 1;
            $mpdf->autoVietnamese = true;
            $mpdf->autoArabic = true;
//            $mpdf->autoLangToFont = true;
            $mpdf->showImageErrors = true;
            $mpdf->SetDirectionality('rtl');
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->WriteHTML($html);
            if ($save) {
                $mpdf->Output($path, 'F');
            } else {
                $mpdf->Output($names.'-'.now(). '.pdf', 'D');
            }
        } catch (MpdfException $e) {
            return redirect()->back()->with('error','Error : '.$e->getMessage());
        }

    }
    public static function exportPDF($Objects, $view, $names,$orientation ='P',  $save = false, $path = '')
    {
//        $html = view($view, compact('Objects', 'names'))->render();

        $pdf = PDF::loadView($view, $Objects);
        return $pdf->download('medium.pdf');
//        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
//        $fontDirs = $defaultConfig['fontDir'];
//
//        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
//        $fontData = $defaultFontConfig['fontdata'];
//
//        try {
//            $mpdf = new \Mpdf\Mpdf([
//                'tempDir' => __DIR__ . '/tmp',
//                'orientation' => $orientation,
//                'setAutoTopMargin' => 'stretch',
//                'autoMarginPadding' => 0,
//                'bleedMargin' => 0,
//                'crossMarkMargin' => 0,
//                'cropMarkMargin' => 0,
//                'nonPrintMargin' => 0,
//                'margBuffer' => 0,
//                'margin_left' => 0,
//                'margin_right' => 0,
//                'margin_top' => 0,
//                'margin_bottom' => 0,
//                'margin_header' => 0,
//                'margin_footer' => 0,
////                'fontDir' => array_merge($fontDirs, [
////                    __DIR__ . '/tmp/ttfontdata',
////                ]),
////                'fontdata' => $fontData + [
////                        'AL-Mohanad' => [
////                            'R' => 'AL-Mohanad-Bold-1.ttf',
////                            'I' => '/home/ahmed/Downloads/AL-Mohanad-Bold-1.ttf-Normal.ttf',
////                        ]
////                    ],
//                'default_font' => 'KFGQPCUthmanTahaNaskh'
//
////                'default_font' => 'Unbatang'
//            ]);
//
//            $mpdf->SetProtection(array('print'));
//            $mpdf->SetTitle($names);
//            $mpdf->autoScriptToLang = true;
//            $mpdf->baseScript = 1;
//            $mpdf->autoVietnamese = true;
//            $mpdf->autoArabic = true;
////            $mpdf->autoLangToFont = true;
//            $mpdf->showImageErrors = true;
//            $mpdf->SetDirectionality('rtl');
//            $mpdf->SetDisplayMode('fullpage');
//            $mpdf->WriteHTML($html);
//            if ($save) {
//                $mpdf->Output($path, 'F');
//            } else {
//                $mpdf->Output($names.'-'.now(). '.pdf', 'D');
//            }
//        } catch (MpdfException $e) {
//            return redirect()->back()->with('error','Error : '.$e->getMessage());
//        }

    }
    public static function sendNotification($notifiable_id,$token, $title,$msg,$data = null,$type= 0,$store = true)
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $registrationIds = $token;


        #prep the bundle
        $message = array
        (
            'body' => $msg,
            'title' => $title,
            'sound' => true,
            'categoryIdentifier' => $type
        );
        $extraNotificationData = ["ref_id" => $data, "type" => $type];

        $fields = array
        (
            'to' => $registrationIds,
            'notification' => $message,
            'data' => $extraNotificationData

        );

        $headers = array
        (
            'Authorization: key=' . config('app.notification_key'),
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        if ($store) {
            $notify = new Notification();
            $notify->type = $type;
            $notify->user_id = $notifiable_id;
            $notify->title = $title;
            $notify->message = $msg;
            if ($data) {
                $notify->ref_id = $data;
            }
            $notify->save();
        }
        return true;
    }
    public static function replace_special_char($string){
        $string = str_replace('/','<span style="font-family: Arial,serif">/</span>',$string);
        $string = str_replace(' - ','<span style="font-family: Arial,serif"> - </span>',$string);
        $string = str_replace(' :','<span style="font-family: Arial,serif"> :</span>',$string);
        $string = str_replace('.','<span style="font-family: Arial,serif">.</span>',$string);
        $string = str_replace('?','<span style="font-family: Arial,serif">?</span>',$string);
        $string = str_replace('|','<span style="font-family: Arial,serif">|</span>',$string);
        $string = str_replace('+','<span style="font-family: Arial,serif">+</span>',$string);
        $string = str_replace('_','<span style="font-family: Arial,serif">_</span>',$string);
        $string = str_replace('(','<span style="font-family: Arial,serif">(</span>',$string);
        $string = str_replace(')','<span style="font-family: Arial,serif">)</span>',$string);
        $string = str_replace('*','<span style="font-family: Arial,serif">*</span>',$string);
        $string = str_replace('&','<span style="font-family: Arial,serif">&</span>',$string);
        $string = str_replace('^','<span style="font-family: Arial,serif">^</span>',$string);
        $string = str_replace('%','<span style="font-family: Arial,serif">%</span>',$string);
        $string = str_replace('$','<span style="font-family: Arial,serif">$</span>',$string);
        $string = str_replace('#','<span style="font-family: Arial,serif">#</span>',$string);
        $string = str_replace('@','<span style="font-family: Arial,serif">@</span>',$string);
        $string = str_replace('!','<span style="font-family: Arial,serif">!</span>',$string);
        $string = str_replace('}','<span style="font-family: Arial,serif">}</span>',$string);
        $string = str_replace('{','<span style="font-family: Arial,serif">{</span>',$string);
        $string = str_replace(']','<span style="font-family: Arial,serif">]</span>',$string);
        $string = str_replace('[','<span style="font-family: Arial,serif">[</span>',$string);
        $string = str_replace('1','<span style="font-family: Arial,serif">1</span>',$string);
        $string = str_replace('2','<span style="font-family: Arial,serif">2</span>',$string);
        $string = str_replace('3','<span style="font-family: Arial,serif">3</span>',$string);
        $string = str_replace('4','<span style="font-family: Arial,serif">4</span>',$string);
        $string = str_replace('5','<span style="font-family: Arial,serif">5</span>',$string);
        $string = str_replace('6','<span style="font-family: Arial,serif">6</span>',$string);
        $string = str_replace('7','<span style="font-family: Arial,serif">7</span>',$string);
        $string = str_replace('8','<span style="font-family: Arial,serif">8</span>',$string);
        $string = str_replace('9','<span style="font-family: Arial,serif">9</span>',$string);
        $string = str_replace('0','<span style="font-family: Arial,serif">0</span>',$string);
        return $string;
    }
}

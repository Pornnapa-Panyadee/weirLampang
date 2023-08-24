<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Auth;
use AuthenticatesUsers;
use App\Models\Location;
use App\Models\AdditinalSuggestion;
use App\Models\DownconcreteInv;
use App\Models\DownprotectionInv;
use App\Models\WeirSurvey;
use App\Models\ControlInv;
use App\Models\ImprovementPlan;
use App\Models\Maintenance;
use App\Models\Photo;
use App\Models\River;
use App\Models\UpconcreteInv;
use App\Models\UpprotectionInv;
use App\Models\User;
use App\Models\WaterdeliveryInv;
use App\Models\WeirLocation;
use App\Models\WeirSpaceification;
use App\Models\WeirExpert;

class PhotoController extends Controller
{
    public function photoHome($weir_id=0) {
        $weir = WeirSurvey::select('*')->where('weir_code',$weir_id)->get();        
        $location = WeirLocation::select('weir_district')->where('weir_location_id',$weir[0]->weir_location_id)->get();
        $photo = Photo::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $expert= WeirExpert::select('map')->where('weir_id',$weir[0]->weir_id)->get()->last();
        // dd($expert['map']);
        $photo1[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $photo2[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $photo3[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $photo4[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $photo5[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $photo6[]=["name"=>NULL,"file"=>NULL,"original"=>NULL];
        $num1=0;$num2=0;$num3=0;$num4=0;$num5=0;$num6=0;

        for($i=0;$i<count($photo);$i++){
            if($photo[$i]->photo_type=="ส่วน Protection เหนือน้ำ"){
                $photo1[$num1]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num1=$num1+1;
            }else if($photo[$i]->photo_type=="ส่วนเหนือน้ำ"){
                
                $photo2[$num2]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num2=$num2+1;
            }else if($photo[$i]->photo_type=="ส่วนควบคุม"){
                $photo3[$num3]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num3=$num3+1;
            }else if($photo[$i]->photo_type=="ส่วนท้ายน้ำ"){
                $photo4[$num4]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num4=$num4+1;
            }else if($photo[$i]->photo_type=="ส่วน Protection ท้ายน้ำ "){
                $photo5[$num5]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num5=$num5+1;
            }else if($photo[$i]->photo_type=="ระบบส่งน้ำ"){
                $photo6[$num6]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                    "original"=>$photo[$i]->photo_filename
                ];
                $num6=$num6+1;
            }
        }

        
        $amp =$location[0]->weir_district;
        // dd($amp);
        return view('guest.photo',compact('expert','photo1','photo2','photo3','photo4','photo5','photo6','num1','num2','num3','num4','num5','num6','weir_id','amp'));
        
        
    }

    public function photoAdd($weir_id=0) {
        $weir = WeirSurvey::select('*')->where('weir_code',$weir_id)->get();
        $photo = Photo::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $code=$weir[0]->weir_code;

        $photo1[]=["name"=>NULL,"file"=>NULL];
        $photo2[]=["name"=>NULL,"file"=>NULL];
        $photo3[]=["name"=>NULL,"file"=>NULL];
        $photo4[]=["name"=>NULL,"file"=>NULL];
        $photo5[]=["name"=>NULL,"file"=>NULL];
        $photo6[]=["name"=>NULL,"file"=>NULL];
        $num1=0;$num2=0;$num3=0;$num4=0;$num5=0;$num6=0;

        for($i=0;$i<count($photo);$i++){
            if($photo[$i]->photo_type=="ส่วน Protection เหนือน้ำ"){
                $photo1[$num1]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num1=$num1+1;
            }else if($photo[$i]->photo_type=="ส่วนเหนือน้ำ"){
                
                $photo2[$num2]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num2=$num2+1;
            }else if($photo[$i]->photo_type=="ส่วนควบคุม"){
                $photo3[$num3]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num3=$num3+1;
            }else if($photo[$i]->photo_type=="ส่วนท้ายน้ำ"){
                $photo4[$num4]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num4=$num4+1;
            }else if($photo[$i]->photo_type=="ส่วน Protection ท้ายน้ำ "){
                $photo5[$num5]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num5=$num5+1;
            }else if($photo[$i]->photo_type=="ระบบส่งน้ำ"){
                $photo6[$num6]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $num6=$num6+1;
            }
        }
        // dd($weir);

        return view('form.addphoto',compact('weir','photo1','photo2','photo3','photo4','photo5','photo6','num1','num2','num3','num4','num5','num6'));
        
        
    }

    public function photoremove($photo_id=0) {
        // dd($photo_id);
        $photo = Photo::select('*')->where('photo_id',$photo_id)->get(); 
        $weir = WeirSurvey::select('weir_code')->where('weir_id',$photo[0]->weir_id)->get();

        $filename = 'images/originals/'.$photo_id.'.jpg';
        if (file_exists($filename)) {
            unlink($filename);
        }
        $filename1 = 'images/thumbnails/'.$photo_id.'.jpg';
        if (file_exists($filename1)) {
            unlink($filename1);
        }
        $photo1 = Photo::select('*')->where('photo_id',$photo_id)->delete(); 

        return redirect()->route('addphoto', ['id' => $weir[0]->weir_code]);
    }


}


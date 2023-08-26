<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
use App\Models\Impovement;


class ReportPDFController extends Controller
{
    public function pdf_index($weir_id=0) {
        // dd(Auth::user()->name);
        // $user = Auth::user()->name;
        ini_set('max_execution_time', 300);
        $weir = WeirSurvey::select('*')->where('weir_code',$weir_id)->get();
        $location = WeirLocation::select('*')->where('weir_location_id',$weir[0]->weir_location_id)->get();
        $river = River::select('*')->where('river_id',$weir[0]->river_id)->get();
        $districtData['data'] = Location::getDistrictCR();
        $space = WeirSpaceification::select('*')->where('weir_spec_id',$weir[0]->weir_spec_id)->get();
        $upprotection = UpprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $upconcrete = UpconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $control = ControlInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $downconcrete = DownconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $downprotection = DownprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $waterdelivery = WaterdeliveryInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $plan = ImprovementPlan::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $maintain1 = Maintenance::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $sug = AdditinalSuggestion::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $photo = Photo::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        


        $model=json_decode($weir[0]->weir_model);
        $locationUTM=json_decode($location[0]->utm);
        $locationLat=json_decode($location[0]->latlong);
        $space[0]->ridge_type=json_decode($space[0]->ridge_type);
        $space[0]->gate_dimension=json_decode($space[0]->gate_dimension);
        $space[0]->control_building_type=json_decode($space[0]->control_building_type);
        $space[0]->control_building_gate_dimension=json_decode($space[0]->control_building_gate_dimension);
        $space[0]->conttrol_building_loc=json_decode($space[0]->conttrol_building_loc);
        $space[0]->canel_dimension=json_decode($space[0]->canel_dimension);
        $upprotection[0]->floor_remake=json_decode($upprotection[0]->floor_remake);
        $upprotection[0]->side_remake=json_decode($upprotection[0]->side_remake);
        $upconcrete[0]->floor_remake=json_decode($upconcrete[0]->floor_remake);
        $upconcrete[0]->side_remake=json_decode($upconcrete[0]->side_remake);
        $control[0]->waterctrl_remake=json_decode($control[0]->waterctrl_remake);
        $control[0]->sidewall_remake=json_decode($control[0]->sidewall_remake);
        $control[0]->dgfloor_remake=json_decode($control[0]->dgfloor_remake);
        $control[0]->dgwall_remake=json_decode($control[0]->dgwall_remake);
        $control[0]->dggate_remake=json_decode($control[0]->dggate_remake);
        $control[0]->dgmachanic_remake=json_decode($control[0]->dgmachanic_remake);
        $control[0]->dgblock_remake=json_decode($control[0]->dgblock_remake);
        $control[0]->waterbreak_remake=json_decode($control[0]->waterbreak_remake);
        $control[0]->bridge_remake=json_decode($control[0]->bridge_remake);

        $downconcrete[0]->floor_remake=json_decode($downconcrete[0]->floor_remake);
        $downconcrete[0]->side_remake=json_decode($downconcrete[0]->side_remake);
        $downconcrete[0]->flrblock_remake=json_decode($downconcrete[0]->flrblock_remake);
        $downconcrete[0]->endsill_remake=json_decode($downconcrete[0]->endsill_remake);

        $downprotection[0]->floor_remake=json_decode($downprotection[0]->floor_remake);
        $downprotection[0]->side_remake=json_decode($downprotection[0]->side_remake);

        $waterdelivery[0]->floor_remake=json_decode($waterdelivery[0]->floor_remake);
        $waterdelivery[0]->side_remake=json_decode($waterdelivery[0]->side_remake);
        $waterdelivery[0]->gate_remake=json_decode($waterdelivery[0]->gate_remake);
        // dd($sug[0]->suggestion);
        $photo1[]=["name"=>NULL,"file"=>NULL];
        $photo2[]=["name"=>NULL,"file"=>NULL];
        $photo3[]=["name"=>NULL,"file"=>NULL];
        $photo4[]=["name"=>NULL,"file"=>NULL];
        $photo5[]=["name"=>NULL,"file"=>NULL];
        $photo6[]=["name"=>NULL,"file"=>NULL];
        $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
        for($i=0;$i<count($photo);$i++){
            if($photo[$i]->photo_type=="ส่วน Protection เหนือน้ำ"){
                $photo1[$a]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $a=$a+1;
            }else if($photo[$i]->photo_type=="ส่วนเหนือน้ำ"){
                
                $photo2[$b]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $b=$b+1;
            }else if($photo[$i]->photo_type=="ส่วนควบคุม"){
                $photo3[$c]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $c=$c+1;
            }else if($photo[$i]->photo_type=="ส่วนท้ายน้ำ"){
                $photo4[$d]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $d=$d+1;
            }else if($photo[$i]->photo_type=="ส่วน Protection ท้ายน้ำ "){
                $photo5[$e]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $e=$e+1;
            }else if($photo[$i]->photo_type=="ระบบส่งน้ำ"){
                $photo6[$f]=[
                    "name"=>$photo[$i]->photo_id,
                    "file"=>$photo[$i]->thumbnall_filename,
                ];
                $f=$f+1;
            }
        }
        $mt=1;
        for($i=0;$i<5;$i++){
            if(!empty($maintain1[$i]->maintain_date)){
                    $maintain[$i]=[
                        'maintain_id'=>$maintain1[$i]->maintain_id,
                        'maintain_date'=>$maintain1[$i]->maintain_date,
                        'maintain_detail'=>$maintain1[$i]->maintain_detail,
                        'maintain_resp'=>$maintain1[$i]->maintain_resp,
                        'maintain_remark'=>$maintain1[$i]->maintain_remark
                    ];
                    $mt=$mt+1;
            }else{
                    $maintain[$i]=[
                        'maintain_id'=>NULL,
                        'maintain_date'=>NULL,
                        'maintain_detail'=>NULL,
                        'maintain_resp'=>NULL,
                        'maintain_remark'=>NULL
                    ];
            }
        }
        
        // dd($photo1);
        //$pdf = PDF::loadView('test_pdf',compact('mt','weir','location','user','districtData','river','model','locationUTM','locationLat','space','upprotection','upconcrete','control','downconcrete','downprotection','waterdelivery','plan','maintain','sug','photo1','photo2','photo3','photo4','photo5','photo6'));
        $pdf = PDF::loadView('test_pdf02',compact('mt','weir','location','districtData','river','model','locationUTM','locationLat','space','upprotection','upconcrete','control','downconcrete','downprotection','waterdelivery','plan','maintain','sug','photo1','photo2','photo3','photo4','photo5','photo6'));
        
        return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
        //return $pdf->download('test.pdf'); //แบบนี้จะดาวโหลดเลย
    }

    public function reportpdf_index($weir_id=0) {
        function checkCuase($text) {
            if($text!=NULL){return $text;	}else{return "-";	}
        }
        function checksediment($text) {
            if($text=="1"){
                $check1="ไม่มีตะกอน ";
            }else if($text=="2"){
                $check1="ตะกอนมีน้อย";
            }else if($text=="3"){
                $check1="ตะกอนมีปานกลาง";
            }else if($text=="4"){
                $check1="ตะกอนมีมาก";
            }else{
                $check1="";
            }
            return $check1;
        }
        
        $weir = WeirSurvey::select('*')->where('weir_code',$weir_id)->get();
        $location = WeirLocation::select('*')->where('weir_location_id',$weir[0]->weir_location_id)->get();
        $river = River::select('*')->where('river_id',$weir[0]->river_id)->get();
        $districtData['data'] = Location::getDistrictCR();
        $space = WeirSpaceification::select('*')->where('weir_spec_id',$weir[0]->weir_spec_id)->get();
        $upprotection = UpprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $upconcrete = UpconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $control = ControlInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $downconcrete = DownconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $downprotection = DownprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $waterdelivery = WaterdeliveryInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $plan = ImprovementPlan::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $maintain1 = Maintenance::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $sug = AdditinalSuggestion::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $photo = Photo::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $expert = WeirExpert::select('*')->where('weir_id',$weir[0]->weir_id)->get();
        $area = DB::table('weir_catchments')->select('*')->where('weir_id', $weir[0]->weir_id)->get();

        // dd($expert);
        // crete json_decode
            $model=json_decode($weir[0]->weir_model);
            $locationUTM=json_decode($location[0]->utm);
            $locationLat=json_decode($location[0]->latlong);
            $space[0]->ridge_type=json_decode($space[0]->ridge_type);
            $space[0]->gate_dimension=json_decode($space[0]->gate_dimension);
            $space[0]->control_building_type=json_decode($space[0]->control_building_type);
            $space[0]->control_building_gate_dimension=json_decode($space[0]->control_building_gate_dimension);
            $space[0]->conttrol_building_loc=json_decode($space[0]->conttrol_building_loc);
            $space[0]->canel_dimension=json_decode($space[0]->canel_dimension);
            $upprotection[0]->floor_remake=json_decode($upprotection[0]->floor_remake);
            $upprotection[0]->side_remake=json_decode($upprotection[0]->side_remake);
            $upconcrete[0]->floor_remake=json_decode($upconcrete[0]->floor_remake);
            $upconcrete[0]->side_remake=json_decode($upconcrete[0]->side_remake);
            $control[0]->waterctrl_remake=json_decode($control[0]->waterctrl_remake);
            $control[0]->sidewall_remake=json_decode($control[0]->sidewall_remake);
            $control[0]->dgfloor_remake=json_decode($control[0]->dgfloor_remake);
            $control[0]->dgwall_remake=json_decode($control[0]->dgwall_remake);
            $control[0]->dggate_remake=json_decode($control[0]->dggate_remake);
            $control[0]->dgmachanic_remake=json_decode($control[0]->dgmachanic_remake);
            $control[0]->dgblock_remake=json_decode($control[0]->dgblock_remake);
            $control[0]->waterbreak_remake=json_decode($control[0]->waterbreak_remake);
            $control[0]->bridge_remake=json_decode($control[0]->bridge_remake);

            $downconcrete[0]->floor_remake=json_decode($downconcrete[0]->floor_remake);
            $downconcrete[0]->side_remake=json_decode($downconcrete[0]->side_remake);
            $downconcrete[0]->flrblock_remake=json_decode($downconcrete[0]->flrblock_remake);
            $downconcrete[0]->endsill_remake=json_decode($downconcrete[0]->endsill_remake);

            $downprotection[0]->floor_remake=json_decode($downprotection[0]->floor_remake);
            $downprotection[0]->side_remake=json_decode($downprotection[0]->side_remake);

            $waterdelivery[0]->floor_remake=json_decode($waterdelivery[0]->floor_remake);
            $waterdelivery[0]->side_remake=json_decode($waterdelivery[0]->side_remake);
            $waterdelivery[0]->gate_remake=json_decode($waterdelivery[0]->gate_remake);
            // dd($sug[0]->suggestion);
            $photo1[]=["name"=>NULL,"file"=>NULL];
            $photo2[]=["name"=>NULL,"file"=>NULL];
            $photo3[]=["name"=>NULL,"file"=>NULL];
            $photo4[]=["name"=>NULL,"file"=>NULL];
            $photo5[]=["name"=>NULL,"file"=>NULL];
            $photo6[]=["name"=>NULL,"file"=>NULL];
        // photo 
            $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
            for($i=0;$i<count($photo);$i++){
                if($photo[$i]->photo_type=="ส่วน Protection เหนือน้ำ"){
                    $photo1[$a]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $a=$a+1;
                }else if($photo[$i]->photo_type=="ส่วนเหนือน้ำ"){
                    
                    $photo2[$b]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $b=$b+1;
                }else if($photo[$i]->photo_type=="ส่วนควบคุม"){
                    $photo3[$c]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $c=$c+1;
                }else if($photo[$i]->photo_type=="ส่วนท้ายน้ำ"){
                    $photo4[$d]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $d=$d+1;
                }else if($photo[$i]->photo_type=="ส่วน Protection ท้ายน้ำ "){
                    $photo5[$e]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $e=$e+1;
                }else if($photo[$i]->photo_type=="ระบบส่งน้ำ"){
                    $photo6[$f]=[
                        "name"=>$photo[$i]->photo_id,
                        "file"=>$photo[$i]->thumbnall_filename,
                    ];
                    $f=$f+1;
                }
            }
        // maintain
            $mt=1;
            for($i=0;$i<5;$i++){
            if(!empty($maintain1[$i]->maintain_date)){
                $maintain[$i]=[
                        'maintain_id'=>$maintain1[$i]->maintain_id,
                        'maintain_date'=>$maintain1[$i]->maintain_date,
                        'maintain_detail'=>$maintain1[$i]->maintain_detail,
                        'maintain_resp'=>$maintain1[$i]->maintain_resp,
                        'maintain_remark'=>$maintain1[$i]->maintain_remark
                ];
                $mt=$mt+1;
            }else{
                    $maintain[$i]=[
                        'maintain_id'=>NULL,
                        'maintain_date'=>NULL,
                        'maintain_detail'=>NULL,
                        'maintain_resp'=>NULL,
                        'maintain_remark'=>NULL
                    ];
            }
        }
        // weir build  form  
            if($model->self->villager==1){
                $model_text1="ก่อสร้างเองโดยใช้แรงงานชาวบ้าน ใช้งบของ : ".$model->self->villager_detial ;
            }else{$model_text1=NULL;}
            if($model->self->weir_std==1){ 
                $model_text2="ใช้แบบมาตราฐาน : ".$model->self->std_detial;
            }else{$model_text2=NULL;}
            if($model->self->weir_self){
                $model_text3="ออกแบบเอง";
            }else{$model_text3=NULL;}
            $model_text=[
                'text1'=>$model_text1,
                'text2'=>$model_text2,
                'text3'=>$model_text3
            ];

        // อาคารบังคับน้ำ สลับปิดและเปิด
            if($space[0]->control_building_type->open->type!=NULL){
                if($space[0]->control_building_type->open->left==1){
                    $building_text="แบบปิด : ฝั่งซ้าย ";
                }else if($space[0]->control_building_type->open->right==1){
                    $building_text="แบบปิด : ฝั่งขวา ";
                }else{
                    $building_text="แบบปิด : -  ";
                }
                $building=[
                    'key'=>"c",
                    'side'=>$building_text,
                    'text1'=>"ขนาดฝาท่อปิด : ".checkCuase($space[0]->conttrol_building_loc->size)." เมตร ",
                    'text2'=>"ความยาวท่อ :".checkCuase($space[0]->conttrol_building_loc->long)." เมตร ",
                    'text3'=>"ระดับธรณีประตู : ".checkCuase($space[0]->conttrol_building_loc->base)
                ];

            }else if ($space[0]->control_building_type->close->type!=NULL){
                if($space[0]->control_building_type->close->left==1){
                    $building_text="แบบเปิด : ฝั่งซ้าย ";
                }else if($space[0]->control_building_type->close->left==1){
                    $building_text="แบบเปิด : ฝั่งขวา ";
                }else{
                    $building_text="แบบเปิด : -  ";
                }
                $building=[
                    'key'=>"o",
                    'side'=>$building_text,
                    'text1'=>"ชนิดบานประตู : ".checkCuase($space[0]->control_building_gate_type),
                    'text2'=>"ชนิดเครื่องยกบาน :".checkCuase($space[0]->control_building_machanic_type),
                    'text3'=>""
                ];

            }else {
                $building=[
                    'key'=>"x",
                    'side'=>" ",
                    'text1'=>" ",
                    'text2'=>" ",
                    'text3'=>""
                ];
            }

        function DateTimeThai($strDate)
        {
                $strYear = (date("Y",strtotime($strDate))+543)-2500;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strMonthCut =  Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear ";
        }

        $d=explode(" ",$weir[0]->created_at);
        $date=DateTimeThai($d[0]);
    
        $sediment=[
            'check1'=>checksediment($upprotection[0]->check_floor),
            'check2'=>checksediment($upconcrete[0]->check_floor),
            'check4'=>checksediment($downconcrete[0]->check_floor),
            'check5'=>checksediment($downprotection[0]->check_floor),
            'check6'=>checksediment($waterdelivery[0]->check_floor),
        ];

        $damage =[
            $upprotection[0]->section_status,
            $upconcrete[0]->section_status,
            $control[0]->section_status,
            $downconcrete[0]->section_status,
            $downprotection[0]->section_status,
            $waterdelivery[0]->section_status,
        ];
        
        dd($expert);
        
        if(!empty($expert[0]->weir_solution)){
            $name="weir_".$weir[0]->weir_code.".pdf";
            $pdf = PDF::loadView('reportPDF.reportOnepage',compact('mt','area','expert','sediment','date','building','model_text','weir','location','districtData','river','model','locationUTM','locationLat','space','upprotection','upconcrete','control','downconcrete','downprotection','waterdelivery','plan','maintain','sug','photo1','photo2','photo3','photo4','photo5','photo6','damage'));
            return $pdf->stream($name);
        }else{
            return view('guest.warning');  
        }
        
         
    }

    public function compositionWeir(Request $request) {
        // dd($request);
        function check_state($s,$t){
            if($s==1 && $t==1){return 1;}
            else if($s==1 && $t==2){return 2;}
            else if($s==1 && $t==3){return 3;}
            else if($s==1 && $t==4){return 4;}
            else{return NULL;}
        }
        $amp=$request->amp;
        $tumbol=$request->tumbol;
        $N=check_state($request->weir_N,4);
        $Y=check_state($request->weir_Y,3);
        $O=check_state($request->weir_O,2);
        $D=check_state($request->weir_D,1);

        // dd($weir_N);
        if($amp=="sum"){$location = WeirLocation::select('*')->get();} 
        else if ($tumbol!=NULL){ $location = WeirLocation::select('*')->where('weir_district',$amp)->where('weir_tumbol',$tumbol)->get();}
        else {$location = WeirLocation::select('*')->where('weir_district',$amp)->get();}
        
        
        // dd($location);
        for ($i=0;$i<count($location);$i++){ 
            $weir = WeirSurvey::select('*')->where('weir_location_id',$location[$i]->weir_location_id)->get();

            $score = DB::table('score_sums')->select('*')->where('weir_id', $weir[0]->weir_id)->get();
            $warning=0;
            if(!empty($score[0]->state)){
                $warning=1;
                if ($score[0]->state==$N || $score[0]->state==$Y || $score[0]->state==$O || $score[0]->state==$D ){
                    $river = River::select('river_name')->where('river_id',$weir[0]->river_id)->get();
                    $latlong=json_decode($location[$i]->latlong);
                    $vill=explode(" ",$location[$i]['weir_village']);
                    
                
                    // เปลี่ยนคำ
                        if(strpos($weir[0]->resp_name, "เทศบาลตำบล")== 0){$weir[0]->resp_name = str_replace("เทศบาลตำบล","ทต.",$weir[0]->resp_name);}
                        // if(strpos($weir[0]->resp_name, "ที่ว่าการอำเภอ")== 0){ $weir[0]->resp_name = str_replace("ที่ว่าการอำเภอ","อ.",$weir[0]->resp_name);}
                        if(strpos($weir[0]->resp_name, "ที่ว่าการอำเภอ")== 0){ 
                            $weir[0]->resp_name = str_replace("ที่ว่าการอำเภอ","อ.",$weir[0]->resp_name); 
                                if($weir[0]->resp_name =="อ."){
                                    $weir[0]->resp_name=="อ.".$amp;
                                }
                        }
                        if(strpos($weir[0]->resp_name, "กรมชลประทาน")== 0){ $weir[0]->resp_name = str_replace("กรมชลประทาน","ชป.",$weir[0]->resp_name);}
                        if(strpos($weir[0]->resp_name, "ไม่ทราบ")== 0){$weir[0]->resp_name = str_replace("ไม่ทราบ","-",$weir[0]->resp_name);}
                        if(strpos($weir[0]->resp_name, "กรมทรัพยากรน้ำ")== 0){ $weir[0]->resp_name = str_replace("กรมทรัพยากรน้ำ","ทน.",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "กรมพัฒนาพลังงานทดแทนและอนุรักษ์พลังงาน")== 0){ $weir[0]->resp_name = str_replace("กรมพัฒนาพลังงานทดแทนและอนุรักษ์พลังงาน","พพ.",$weir[0]->resp_name); } 
                        if(strpos($weir[0]->resp_name, "สำนักงานเร่งรัดพัฒนาชนบท")== 0){ $weir[0]->resp_name = str_replace("สำนักงานเร่งรัดพัฒนาชนบท","รพช.",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "กรมพัฒนาที่ดิน")== 0){ $weir[0]->resp_name = str_replace("กรมพัฒนาที่ดิน","พด.",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "สำนักงานการปฏิรูปที่ดินเพื่อเกษตรกรรม")== 0){ $weir[0]->resp_name = str_replace("สำนักงานการปฏิรูปที่ดินเพื่อเกษตรกรรม","ส.ป.ก.",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "เทศบาลนครเชียงราย")== 0){ $weir[0]->resp_name = str_replace("เทศบาลนครเชียงราย","ทน.เชียงราย",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "กรมโยธาธิการและผังเมือง")== 0){ $weir[0]->resp_name = str_replace("กรมโยธาธิการและผังเมือง","ยผ.",$weir[0]->resp_name); }
                        if(strpos($weir[0]->resp_name, "องค์การบริหารส่วนจังหวัดเชียงราย")== 0){ $weir[0]->resp_name = str_replace("องค์การบริหารส่วนจังหวัดเชียงราย","อบจ.เชียงราย",$weir[0]->resp_name); }
                    // ---------------
                        if(strpos($weir[0]->transfer, "เทศบาลตำบล")== 0){ $weir[0]->transfer = str_replace("เทศบาลตำบล","ทต.",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "ที่ว่าการอำเภอ")== 0){$weir[0]->transfer = str_replace("ที่ว่าการอำเภอ","อ.",$weir[0]->transfer);}
                        if(strpos($weir[0]->transfer, "กรมชลประทาน")== 0){ $weir[0]->transfer = str_replace("กรมชลประทาน","ชป.",$weir[0]->transfer);}
                        if(strpos($weir[0]->transfer, "ไม่ได้โอน")== 0){ $weir[0]->transfer = str_replace("ไม่ได้โอน","-",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "ไม่ทราบ")== 0){$weir[0]->transfer = str_replace("ไม่ทราบ","-",$weir[0]->transfer);}
                        if(strpos($weir[0]->transfer, "กรมทรัพยากรน้ำ")== 0){ $weir[0]->transfer = str_replace("กรมทรัพยากรน้ำ","ทน.",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "กรมโยธาธิการและผังเมือง")== 0){ $weir[0]->transfer = str_replace("กรมโยธาธิการและผังเมือง","ยผ.",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "กรมพัฒนาที่ดิน")== 0){ $weir[0]->transfer = str_replace("กรมพัฒนาที่ดิน","พด.",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "กรมพัฒนาพลังงานทดแทนและอนุรักษ์พลังงาน")== 0){ $weir[0]->transfer = str_replace("กรมพัฒนาพลังงานทดแทนและอนุรักษ์พลังงาน","พพ.",$weir[0]->transfer); } 
                        if(strpos($weir[0]->transfer, "สำนักงานเร่งรัดพัฒนาชนบท")== 0){ $weir[0]->transfer = str_replace("สำนักงานเร่งรัดพัฒนาชนบท","รพช.",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "กองทัพภาคที่3กองกำลังผาเมืองกรมทหารราบที่31")== 0){ $weir[0]->transfer = str_replace("กองทัพภาคที่3กองกำลังผาเมืองกรมทหารราบที่31","กองทัพภาคที่3",$weir[0]->transfer); }
                        if(strpos($weir[0]->transfer, "การไฟฟ้าส่วนภูมิภาค")== 0){ $weir[0]->transfer = str_replace("การไฟฟ้าส่วนภูมิภาค","กฟภ.",$weir[0]->transfer); }
                            
        
                        if( $weir[0]->weir_name=="โครงการส่งน้ำและบำรุงรักษาแม่ลาว"){ $name="โครงการส่งน้ำ"."\n"."และบำรุงรักษาแม่ลาว";}
                        else if($weir[0]->weir_name=="ประตูระบายน้ำเจ้าวรกานบรรชา"){ $name="ประตูระบายน้ำ"."\n"."เจ้าวรกานบรรชา";}
                        else{$name=$weir[0]->weir_name;}
        
                        if($river[0]->river_name=="หนองเพลิงน่าน/ห้วยแซะ"){ $river[0]->river_name="หนองเพลิงน่าน";}
        
                        $result[] = [
                                'weir_id'=> $weir[0]->weir_id,
                                'weir_code'=> $weir[0]->weir_code,
                                'weir_name'=> $name,
                                'lat'=>number_format($latlong->x, 3, '.', ''), 
                                'long'=>number_format($latlong->y, 3, '.', ''), 
                                'weir_village'=> $vill[2],
                                'weir_tumbol'=> $location[$i]->weir_tumbol,
                                'weir_district'=> $location[$i]->weir_district,
                                'river' => $river[0]->river_name,
                                'resp_name'=> $weir[0]->resp_name,
                                'transfer'=>$weir[0]->transfer,
                                'damage_1'=> $score[0]->damage_1,
                                'damage_2'=> $score[0]->damage_2,
                                'damage_3'=> $score[0]->damage_3,
                                'damage_4'=> $score[0]->damage_4,
                                'damage_5'=> $score[0]->damage_5,
                                'damage_6'=> $score[0]->damage_6,
                                'damage_score_1'=> number_format($score[0]->damage_score_1, 2, '.', ''),
                                'damage_score_2'=> number_format($score[0]->damage_score_2, 2, '.', ''),
                                'damage_score_3'=> number_format($score[0]->damage_score_3, 2, '.', ''),
                                'damage_score_4'=> number_format($score[0]->damage_score_4, 2, '.', ''),
                                'damage_score_5'=> number_format($score[0]->damage_score_5, 2, '.', ''),
                                'damage_score_6'=> number_format($score[0]->damage_score_6, 2, '.', ''),
                                'sumScoreAll'=>number_format($score[0]->score, 2, '.', '') ,
                                'classSum'=>$score[0]->class_1
                    ];
        
                }
            }else{ $warning=0;break;}
           
        }
            
        
        if(isset($result)==NULL){$dataNo=1;}
        else{$dataNo=0;}
        $amp=$amp;
        if($tumbol!=NULL){ $text_amp="ตำบล".$tumbol."  อำเภอ".$amp; }
        else{ $text_amp="อำเภอ".$amp; }
        // $result = json_encode($result);
        
        // dd($result);
        // if($amp=="แม่จัน"){
        //     return view('guest.warning'); 
        // }else{
        //     $name="weir_report.pdf";
        //     $pdf = PDF::loadView('reportPDF.weir_composition',compact('result','amp','dataNo','tumbol','text_amp'))->setPaper('Letter', 'landscape');;
        //     return $pdf->stream($name);
        // }
        if($warning==1){
            $name="weir_report.pdf";
            $pdf = PDF::loadView('reportPDF.weir_composition',compact('result','amp','dataNo','tumbol','text_amp'))->setPaper('Letter', 'landscape');;
            return $pdf->stream($name);
        }else{
            return view('guest.warning'); 
        }

    }

    public function problemWeir($amp=0)
    {
        $location = WeirLocation::select('*')->where('weir_district',$amp)->get();
        for ($i=0;$i<count($location);$i++){ 
            $weir = WeirSurvey::select('*')->where('weir_location_id',$location[$i]->weir_location_id)->get();
            $river = River::select('river_name')->where('river_id',$weir[0]->river_id)->get();
            $latlong=json_decode($location[$i]->latlong);
            $vill=explode(" ",$location[$i]['weir_village']);
            $expert = WeirExpert::select('*')->where('weir_id',$weir[0]->weir_id)->get();

            $result[] = [
                'weir_id'=> $weir[0]->weir_id,
                'weir_code'=> $weir[0]->weir_code,
                'weir_name'=> $weir[0]->weir_name,
                'lat'=>number_format($latlong->x, 3, '.', ''), 
                'long'=>number_format($latlong->y, 3, '.', ''), 
                'weir_village'=> $vill[2],
                'weir_tumbol'=> $location[$i]->weir_tumbol,
                'weir_district'=> $location[$i]->weir_district,
                'river' => $river[0]->river_name,
                'resp_name'=> $weir[0]->resp_name,
                'transfer'=>$weir[0]->transfer,
                'problem'=>$expert[0]->weir_problem,
                'solution'=>$expert[0]->weir_solution
                

            ];
            
        }

        // dd($result);
        $name=$amp.".pdf";
        $pdf = PDF::loadView('reportPDF.reportProblem',compact('result','amp'));
        return $pdf->stream($name); 
    }

    public function reportOne_amp(Request $request) {
        // dd($request);
        // function
            function DateTimeThai($strDate)
            {
                $strYear = (date("Y",strtotime($strDate))+543)-2500;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strMonthCut =  Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear ";
            }
            function checkCuase($text) {
                if($text!=NULL){return $text;	}else{return "-";	}
            }
            function checksediment($text) {
                if($text=="1"){
                    $check1="ไม่มีตะกอน ";
                }else if($text=="2"){
                    $check1="ตะกอนมีน้อย";
                }else if($text=="3"){
                    $check1="ตะกอนมีปานกลาง";
                }else if($text=="4"){
                    $check1="ตะกอนมีมาก";
                }else{
                    $check1="";
                }
                return $check1;
            }
            function check_state($s,$t){
                if($s==1 && $t==1){return 1;}
                else if($s==1 && $t==2){return 2;}
                else if($s==1 && $t==3){return 3;}
                else if($s==1 && $t==4){return 4;}
                else{return NULL;}
            }
        $amp=$request->amp;
        $tumbol=$request->tumbol;
        $N=check_state($request->weir_N,4);
        $Y=check_state($request->weir_Y,3);
        $O=check_state($request->weir_O,2);
        $D=check_state($request->weir_D,1);

        // dd($weir_N);
        if($amp=="sum"){$locations = WeirLocation::select('*')->get();} 
        else if ($tumbol!=NULL){ $locations = WeirLocation::select('*')->where('weir_district',$amp)->where('weir_tumbol',$tumbol)->get();}
        else {$locations = WeirLocation::select('*')->where('weir_district',$amp)->get();}
        
        
        // dd($num);
        // $num=2;
        $c_line=0;
            for ($z=0;$z<count($locations) ;$z++){ 
                
                $weir = WeirSurvey::select('*')->where('weir_location_id',$locations[$z]->weir_location_id)->get();
                $location = WeirLocation::select('*')->where('weir_location_id',$weir[0]->weir_location_id)->get();
                $river = River::select('*')->where('river_id',$weir[0]->river_id)->get();
                $districtData['data'] = Location::getDistrictCR();
                $space = WeirSpaceification::select('*')->where('weir_spec_id',$weir[0]->weir_spec_id)->get();
                $upprotection = UpprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $upconcrete = UpconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $control = ControlInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $downconcrete = DownconcreteInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $downprotection = DownprotectionInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $waterdelivery = WaterdeliveryInv::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $plan = ImprovementPlan::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $maintain1 = Maintenance::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $sug = AdditinalSuggestion::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $photo = Photo::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $expert = WeirExpert::select('*')->where('weir_id',$weir[0]->weir_id)->get();
                $area = DB::table('weir_catchments')->select('*')->where('weir_id', $weir[0]->weir_id)->get();
                $score = DB::table('score_sums')->select('*')->where('weir_id', $weir[0]->weir_id)->get();
                // dd($score);
                $warning=0;
                if(!empty($score[0]->state)){
                    $warning=1;
                    if ($score[0]->state==$N || $score[0]->state==$Y || $score[0]->state==$O || $score[0]->state==$D ){
                        // dd($expert);
                        // crete json_decode
                            $model=json_decode($weir[0]->weir_model);
                            $locationUTM=json_decode($location[0]->utm);
                            $locationLat=json_decode($location[0]->latlong);
                            $space[0]->ridge_type=json_decode($space[0]->ridge_type);
                            $space[0]->gate_dimension=json_decode($space[0]->gate_dimension);
                            $space[0]->control_building_type=json_decode($space[0]->control_building_type);
                            $space[0]->control_building_gate_dimension=json_decode($space[0]->control_building_gate_dimension);
                            $space[0]->conttrol_building_loc=json_decode($space[0]->conttrol_building_loc);
                            $space[0]->canel_dimension=json_decode($space[0]->canel_dimension);
                            $upprotection[0]->floor_remake=json_decode($upprotection[0]->floor_remake);
                            $upprotection[0]->side_remake=json_decode($upprotection[0]->side_remake);
                            $upconcrete[0]->floor_remake=json_decode($upconcrete[0]->floor_remake);
                            $upconcrete[0]->side_remake=json_decode($upconcrete[0]->side_remake);
                            $control[0]->waterctrl_remake=json_decode($control[0]->waterctrl_remake);
                            $control[0]->sidewall_remake=json_decode($control[0]->sidewall_remake);
                            $control[0]->dgfloor_remake=json_decode($control[0]->dgfloor_remake);
                            $control[0]->dgwall_remake=json_decode($control[0]->dgwall_remake);
                            $control[0]->dggate_remake=json_decode($control[0]->dggate_remake);
                            $control[0]->dgmachanic_remake=json_decode($control[0]->dgmachanic_remake);
                            $control[0]->dgblock_remake=json_decode($control[0]->dgblock_remake);
                            $control[0]->waterbreak_remake=json_decode($control[0]->waterbreak_remake);
                            $control[0]->bridge_remake=json_decode($control[0]->bridge_remake);
    
                            $downconcrete[0]->floor_remake=json_decode($downconcrete[0]->floor_remake);
                            $downconcrete[0]->side_remake=json_decode($downconcrete[0]->side_remake);
                            $downconcrete[0]->flrblock_remake=json_decode($downconcrete[0]->flrblock_remake);
                            $downconcrete[0]->endsill_remake=json_decode($downconcrete[0]->endsill_remake);
    
                            $downprotection[0]->floor_remake=json_decode($downprotection[0]->floor_remake);
                            $downprotection[0]->side_remake=json_decode($downprotection[0]->side_remake);
    
                            $waterdelivery[0]->floor_remake=json_decode($waterdelivery[0]->floor_remake);
                            $waterdelivery[0]->side_remake=json_decode($waterdelivery[0]->side_remake);
                            $waterdelivery[0]->gate_remake=json_decode($waterdelivery[0]->gate_remake);
                        // dd($sug[0]->suggestion);
                          
                        // photo 
                            $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
                            $photo1[0]=["name"=>NULL,"file"=>NULL];
                            $photo2[0]=["name"=>NULL,"file"=>NULL];
                            $photo3[0]=["name"=>NULL,"file"=>NULL];
                            $photo4[0]=["name"=>NULL,"file"=>NULL];
                            $photo5[0]=["name"=>NULL,"file"=>NULL];
                            $photo6[0]=["name"=>NULL,"file"=>NULL];
                            $photo1[1]=["name"=>NULL,"file"=>NULL];
                            $photo2[1]=["name"=>NULL,"file"=>NULL];
                            $photo3[1]=["name"=>NULL,"file"=>NULL];
                            $photo4[1]=["name"=>NULL,"file"=>NULL];
                            $photo5[1]=["name"=>NULL,"file"=>NULL];
                            $photo6[1]=["name"=>NULL,"file"=>NULL];
                            for($i=0;$i<count($photo);$i++){
                                if($photo[$i]->photo_type=="ส่วน Protection เหนือน้ำ"){
                                    $photo1[$a]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $a=$a+1;
                                }else if($photo[$i]->photo_type=="ส่วนเหนือน้ำ"){
                                    
                                    $photo2[$b]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $b=$b+1;
                                }else if($photo[$i]->photo_type=="ส่วนควบคุม"){
                                    $photo3[$c]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $c=$c+1;
                                }else if($photo[$i]->photo_type=="ส่วนท้ายน้ำ"){
                                    $photo4[$d]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $d=$d+1;
                                }else if($photo[$i]->photo_type=="ส่วน Protection ท้ายน้ำ "){
                                    $photo5[$e]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $e=$e+1;
                                }else if($photo[$i]->photo_type=="ระบบส่งน้ำ"){
                                    $photo6[$f]=[
                                        "name"=>$photo[$i]->photo_id,
                                        "file"=>$photo[$i]->thumbnall_filename,
                                    ];
                                    $f=$f+1;
                                }
                            }
                        // maintain
                            $mt=1;
                            for($j=0;$j<5;$j++){
                                if(!empty($maintain1[$j]->maintain_date)){
                                    $maintain[$j]=[
                                            'maintain_id'=>$maintain1[$j]->maintain_id,
                                            'maintain_date'=>$maintain1[$j]->maintain_date,
                                            'maintain_detail'=>$maintain1[$j]->maintain_detail,
                                            'maintain_resp'=>$maintain1[$j]->maintain_resp,
                                            'maintain_remark'=>$maintain1[$j]->maintain_remark
                                    ];
                                    $mt=$mt+1;
                                }else{
                                        $maintain[$j]=[
                                            'maintain_id'=>NULL,
                                            'maintain_date'=>NULL,
                                            'maintain_detail'=>NULL,
                                            'maintain_resp'=>NULL,
                                            'maintain_remark'=>NULL
                                        ];
                                }
                            }
                        // weir build  form  
                            if($model->self->villager==1){
                                $model_text1="ก่อสร้างเองโดยใช้แรงงานชาวบ้าน ใช้งบของ : ".$model->self->villager_detial ;
                            }else{$model_text1=NULL;}
                            if($model->self->weir_std==1){ 
                                $model_text2="ใช้แบบมาตราฐาน : ".$model->self->std_detial;
                            }else{$model_text2=NULL;}
                            if($model->self->weir_self){
                                $model_text3="ออกแบบเอง";
                            }else{$model_text3=NULL;}
                            $model_text=[
                                'text1'=>$model_text1,
                                'text2'=>$model_text2,
                                'text3'=>$model_text3
                            ];
    
                        // อาคารบังคับน้ำ สลับปิดและเปิด
                            if($space[0]->control_building_type->open->type!=NULL){
                                if($space[0]->control_building_type->open->left==1){
                                    $building_text="แบบปิด : ฝั่งซ้าย ";
                                }else if($space[0]->control_building_type->open->right==1){
                                    $building_text="แบบปิด : ฝั่งขวา ";
                                }else{
                                    $building_text="แบบปิด : -  ";
                                }
                                $building=[
                                    'key'=>"c",
                                    'side'=>$building_text,
                                    'text1'=>"ขนาดฝาท่อปิด : ".checkCuase($space[0]->conttrol_building_loc->size)." เมตร ",
                                    'text2'=>"ความยาวท่อ :".checkCuase($space[0]->conttrol_building_loc->long)." เมตร ",
                                    'text3'=>"ระดับธรณีประตู : ".checkCuase($space[0]->conttrol_building_loc->base)
                                ];
    
                            }else if ($space[0]->control_building_type->close->type!=NULL){
                                if($space[0]->control_building_type->close->left==1){
                                    $building_text="แบบเปิด : ฝั่งซ้าย ";
                                }else if($space[0]->control_building_type->close->left==1){
                                    $building_text="แบบเปิด : ฝั่งขวา ";
                                }else{
                                    $building_text="แบบเปิด : -  ";
                                }
                                $building=[
                                    'key'=>"o",
                                    'side'=>$building_text,
                                    'text1'=>"ชนิดบานประตู : ".checkCuase($space[0]->control_building_gate_type),
                                    'text2'=>"ชนิดเครื่องยกบาน :".checkCuase($space[0]->control_building_machanic_type),
                                    'text3'=>""
                                ];
    
                            }else {
                                $building=[
                                    'key'=>"x",
                                    'side'=>" ",
                                    'text1'=>" ",
                                    'text2'=>" ",
                                    'text3'=>""
                                ];
                            }
    
    
                            $d=explode(" ",$weir[0]->created_at);
                            $date=DateTimeThai($d[0]);
                        
                            $sediment=[
                                'check1'=>checksediment($upprotection[0]->check_floor),
                                'check2'=>checksediment($upconcrete[0]->check_floor),
                                'check4'=>checksediment($downconcrete[0]->check_floor),
                                'check5'=>checksediment($downprotection[0]->check_floor),
                                'check6'=>checksediment($waterdelivery[0]->check_floor),
                            ];
                            $damage=[$score[0]->damage_1,$score[0]->damage_2,$score[0]->damage_3,$score[0]->damage_4,$score[0]->damage_5,$score[0]->damage_6];
                            // dd($damage);
                        $result[] = [
                            'i'=>$z,
                            'area'=> $area,
                            'expert'=>$expert,
                            'sediment'=>$sediment,
                            'date'=>$date,
                            'building'=>$building,
                            'model_text'=>$model_text,
                            'weir'=>$weir,
                            'location'=>$location,
                            'districtData'=>$districtData,
                            'river'=>$river,
                            'model'=>$model,
                            'locationUTM'=>$locationUTM,
                            'locationLat'=>$locationLat,
                            'space'=>$space,
                            'upprotection'=>$upprotection,
                            'upconcrete'=>$upconcrete,
                            'control'=>$control,
                            'downconcrete'=>$downconcrete,
                            'downprotection'=>$downprotection,
                            'waterdelivery'=>$waterdelivery,
                            'plan'=>$plan,
                            'maintain'=>$maintain,
                            'sug'=>$sug,
                            'photo1'=>$photo1,
                            'photo2'=>$photo2,
                            'photo3'=>$photo3,
                            'photo4'=>$photo4,
                            'photo5'=>$photo5,
                            'photo6'=>$photo6,
                            'damage'=>$damage,
                            'mt'=>$mt
                            
                        ];
                        $c_line=$c_line+1;                    
                    }
                }else{break;}
                
            }
        
            // dd($result[4]);
        
        if(isset($result)==NULL){$num = 0;}
        else{ $num = count($result); }

        if($tumbol!=NULL){$text_tm = "ตำบล".$tumbol; }
        else{$text_tm = "" ;}
    
        $text_amp = "อำเภอ".$amp;

        $name="อำเภอ".$amp.".pdf";
        if($warning==0){
            return view('guest.warning');  
        }else{
            $pdf = PDF::loadView('reportPDF.reportOnepage_amp',compact('result','num','text_tm','text_amp','dataNo'));
            return $pdf->stream($name); 
        }
        
    }

    public function testPDF($weir_id=0)
    {
        
        $weir = WeirSurvey::select('*')->where('weir_code',$weir_id)->get();
        // dd($amp);
        $name= "test.pdf";
        $pdf = PDF::loadView('reportPDF.test',compact("weir"));
        return $pdf->stream($name); 
    }

    public function reportpdf_warning($weir_id=0) {
        return view('guest.warning'); 
        
    }

    public function sedimentUpconcrete(Request $request) {
        // dd($request);
        function check_state($s,$t){
            if($s==1 && $t==1){return 1;}
            else if($s==1 && $t==2){return 2;}
            else if($s==1 && $t==3){return 3;}
            else if($s==1 && $t==4){return 4;}
            else{return 0;}
        }
        $amp=$request->amp;
        $tumbol=$request->tumbol;
        $N=check_state($request->weir_N,2);
        $Y=check_state($request->weir_Y,3);
        $O=check_state($request->weir_O,4);

        // dd($Y);
        if($amp=="sum"){$location = WeirLocation::select('*')->get();} 
        else if ($tumbol!=NULL){ $location = WeirLocation::select('*')->where('weir_district',$amp)->where('weir_tumbol',$tumbol)->get();}
        else {$location = WeirLocation::select('*')->where('weir_district',$amp)->get();}
        
        $result=[];
        // dd($location);
        for ($i=0;$i<count($location);$i++){ 
            $weir = WeirSurvey::select('*')->where('weir_location_id',$location[$i]->weir_location_id)->get();
            $sediment_level= UpconcreteInv::select('check_floor')->where('weir_id', $weir[0]->weir_id)->get();
            // dd($sediment_level[0]->check_floor);
            if ($sediment_level[0]->check_floor==$N || $sediment_level[0]->check_floor==$Y || $sediment_level[0]->check_floor==$O ){
                $river = River::select('river_name')->where('river_id',$weir[0]->river_id)->get();
                $latlong=json_decode($location[$i]->latlong);
                $vill=explode(" ",$location[$i]['weir_village']);                    
                // เปลี่ยนคำ
                if(strpos($weir[0]->resp_name, "เทศบาลตำบล")== 0){$weir[0]->resp_name = str_replace("เทศบาลตำบล","ทต.",$weir[0]->resp_name);}
                // if(strpos($weir[0]->resp_name, "ที่ว่าการอำเภอ")== 0){ $weir[0]->resp_name = str_replace("ที่ว่าการอำเภอ","อ.",$weir[0]->resp_name);}
                if(strpos($weir[0]->resp_name, "ที่ว่าการอำเภอ")== 0){ 
                    $weir[0]->resp_name = str_replace("ที่ว่าการอำเภอ","อ.",$weir[0]->resp_name); 
                        if($weir[0]->resp_name =="อ."){ $weir[0]->resp_name=="อ.".$amp; }
                        }
                $result[] = [
                    'weir_id'=> $weir[0]->weir_id,
                    'weir_code'=> $weir[0]->weir_code,
                    'weir_name'=> $weir[0]->weir_name,
                    'lat'=>number_format($latlong->x, 3, '.', ''), 
                    'long'=>number_format($latlong->y, 3, '.', ''), 
                    'weir_village'=> $vill[2],
                    'weir_tumbol'=> $location[$i]->weir_tumbol,
                    'weir_district'=> $location[$i]->weir_district,
                    'river' => $river[0]->river_name,
                    'resp_name'=> $weir[0]->resp_name,
                    'transfer'=>$weir[0]->transfer,
                    'sediment_level'=>$sediment_level[0]->check_floor
                    ];

            }
            
           
        }

        // dd(count($result));

        if(count($result)==0){$dataNo=1;}
        else{$dataNo=0;}
        $amp=$amp;
        if($tumbol!=NULL){ $text_amp="ตำบล".$tumbol."  อำเภอ".$amp; }
        else{ $text_amp="อำเภอ".$amp; }
        // dd($dataNo);
        $name="weir_report.pdf";
        $pdf = PDF::loadView('reportPDF.weir_sediment',compact('result','amp','dataNo','tumbol','text_amp'))->setPaper('Letter', 'landscape');;
        return $pdf->stream($name);
        

    }
}
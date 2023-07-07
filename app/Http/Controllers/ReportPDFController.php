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

        //  Calculator about Weight score componant of weir ----------------------------

            function level1($t){
                $l=[0,4,3,2,1];
                if($t==NULL){ return 0;}
                else { return $l[$t];}
            }
            function level2($t){
                $l=[0,4,1,2,3];
                if($t==NULL){ return 0;}
                else { return $l[$t];}
            }
            function cal_level($t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9){
                $w=[0,0.2,0.15,0.15,0.005,0.15,0.15,0.15,0.005,0.04];
                $cal[0]=0.00000001;
                $cal[1] = $w[1]*level1($t1) + $w[2]*level1($t2) + $w[3]*level1($t3 )+ $w[4]*level1($t4) + $w[5]*level1($t5) + $w[6]*level1($t6) + $w[7]*level1($t7) + $w[8]*level2($t8) + $w[9]*level1($t9);
                if($cal[1]!=0){ $cal[0]=1;} 
                return ($cal);
            }
            function score($s){
                if($s<0.1){$c=0;}
                elseif($s<1.99){$c=1;}
                elseif($s<2.99){$c=2;}
                elseif($s<3.49){$c=3;}
                else{$c=4;}
                return $c;
            }
        
            // 1.1
                $level_upprotection_1=cal_level($upprotection[0]->floor_erosion,$upprotection[0]->floor_subsidence ,$upprotection[0]->floor_cracking ,$upprotection[0]->floor_obstruction , $upprotection[0]->floor_hole , $upprotection[0]->floor_leak ,$upprotection[0]->floor_movement ,$upprotection[0]->floor_drainage ,$upprotection[0]->floor_weed );
            // 1.2
                $level_upprotection_2=cal_level($upprotection[0]->side_erosion,$upprotection[0]->side_subsidence ,$upprotection[0]->side_cracking ,$upprotection[0]->side_obstruction , $upprotection[0]->side_hole , $upprotection[0]->side_leak ,$upprotection[0]->side_movement ,$upprotection[0]->side_drainage ,$upprotection[0]->side_weed );
            // --- Avg 1 
                $damage[0] = score(($level_upprotection_1[1]+ $level_upprotection_2[1])/ ($level_upprotection_1[0]+ $level_upprotection_2[0]));

            // 2.1
                $level_upconcrete_1=cal_level($upconcrete[0]->floor_erosion,$upconcrete[0]->floor_subsidence ,$upconcrete[0]->floor_cracking ,$upconcrete[0]->floor_obstruction , $upconcrete[0]->floor_hole , $upconcrete[0]->floor_leak ,$upconcrete[0]->floor_movement ,$upconcrete[0]->floor_drainage ,$upconcrete[0]->floor_weed );
            // 2.2
                $level_upconcrete_2=cal_level($upconcrete[0]->side_erosion,$upconcrete[0]->side_subsidence ,$upconcrete[0]->side_cracking ,$upconcrete[0]->side_obstruction , $upconcrete[0]->side_hole , $upconcrete[0]->side_leak ,$upconcrete[0]->side_movement ,$upconcrete[0]->side_drainage ,$upconcrete[0]->side_weed );
            // --- Avg 2
                $damage[1]= score(($level_upconcrete_1[1]+ $level_upconcrete_2[1])/ ($level_upconcrete_1[0]+ $level_upconcrete_2[0]));
            
            //----- control 
            $damage[2]= 0;
            
            if( strpos($control[0]->dggate_damage, "ชำรุด")!== false || strpos( $control[0]->dgmachanic_damage, "ชำรุด" )!== false ) { 
               
                $damage[3] = 1;
            }else{
                // 3.1 control
                    $level_control_1=cal_level($control[0]->waterctrl_erosion,$control[0]->waterctrl_subsidence ,$control[0]->waterctrl_cracking ,$control[0]->waterctrl_obstruction , $control[0]->waterctrl_hole , $control[0]->waterctrl_leak ,$control[0]->waterctrl_movement ,$control[0]->waterctrl_drainage ,$control[0]->waterctrl_weed );
                // 3.2
                    $level_control_2=cal_level($control[0]->sidewall_erosion,$control[0]->sidewall_subsidence ,$control[0]->sidewall_cracking ,$control[0]->sidewall_obstruction , $control[0]->sidewall_hole , $control[0]->sidewall_leak ,$control[0]->sidewall_movement ,$control[0]->sidewall_drainage ,$control[0]->sidewall_weed );
                // --- Avg 3
                
                // 3.3.1
                    $level_control_3_1=cal_level($control[0]->dgfloor_erosion,$control[0]->dgfloor_subsidence ,$control[0]->dgfloor_cracking ,$control[0]->dgfloor_obstruction , $control[0]->dgfloor_hole , $control[0]->dgfloor_leak ,$control[0]->dgfloor_movement ,$control[0]->dgfloor_drainage ,$control[0]->dgfloor_weed );
                // 3.3.2
                    $level_control_3_2=cal_level($control[0]->dgwall_erosion,$control[0]->dgwall_subsidence ,$control[0]->dgwall_cracking ,$control[0]->dgwall_obstruction , $control[0]->dgwall_hole , $control[0]->dgwall_leak ,$control[0]->dgwall_movement ,$control[0]->dgwall_drainage ,$control[0]->dgwall_weed );
                // 3.3.3
                    $level_control_3_3=cal_level($control[0]->dggate_erosion,$control[0]->dggate_subsidence ,$control[0]->dggate_cracking ,$control[0]->dggate_obstruction , $control[0]->dggate_hole , $control[0]->dggate_leak ,$control[0]->dggate_movement ,$control[0]->dggate_drainage ,$control[0]->dggate_weed );
                // 3.3.4
                    $level_control_3_4=cal_level($control[0]->dgmachanic_erosion,$control[0]->dgmachanic_subsidence ,$control[0]->dgmachanic_cracking ,$control[0]->dgmachanic_obstruction , $control[0]->dgmachanic_hole , $control[0]->dgmachanic_leak ,$control[0]->dgmachanic_movement ,$control[0]->dgmachanic_drainage ,$control[0]->dgmachanic_weed );
                // 3.4
                    $level_control_4=cal_level($control[0]->dgblock_erosion,$control[0]->dgblock_subsidence ,$control[0]->dgblock_cracking ,$control[0]->dgblock_obstruction , $control[0]->dgblock_hole , $control[0]->dgblock_leak ,$control[0]->dgblock_movement ,$control[0]->dgblock_drainage ,$control[0]->dgblock_weed );
                // 3.5
                    $level_control_5=cal_level($control[0]->waterbreak_erosion,$control[0]->waterbreak_subsidence ,$control[0]->waterbreak_cracking ,$control[0]->waterbreak_obstruction , $control[0]->waterbreak_hole , $control[0]->waterbreak_leak ,$control[0]->waterbreak_movement ,$control[0]->waterbreak_drainage ,$control[0]->waterbreak_weed );
                // 3.6
                    $level_control_6=cal_level($control[0]->bridge_erosion,$control[0]->bridge_subsidence ,$control[0]->bridge_cracking ,$control[0]->bridge_obstruction , $control[0]->bridge_hole , $control[0]->bridge_leak ,$control[0]->bridge_movement ,$control[0]->bridge_drainage ,$control[0]->bridge_weed );
                // --- Avg 3
                    $damage[3]= score(($level_control_1[1]+ $level_control_2[1]+$level_control_3_1[1]+ $level_control_3_2[1]+$level_control_3_3[1]+ $level_control_3_4[1]+$level_control_4[1]+ $level_control_5[1]+ $level_control_6[1] )/ ($level_control_1[0]+ $level_control_2[0]+$level_control_3_1[0]+ $level_control_3_2[0]+$level_control_3_3[0]+ $level_control_3_4[0]+$level_control_4[0]+ $level_control_5[0]+ $level_control_6[0] ));
                    // $damage[3] =99;
            }
            // 4.1 downconcrete
                $level_downconcrete_1=cal_level($downconcrete[0]->floor_erosion,$downconcrete[0]->floor_subsidence ,$downconcrete[0]->floor_cracking ,$downconcrete[0]->floor_obstruction , $downconcrete[0]->floor_hole , $downconcrete[0]->floor_leak ,$downconcrete[0]->floor_movement ,$downconcrete[0]->floor_drainage ,$downconcrete[0]->floor_weed );
            // 4.2
                $level_downconcrete_2=cal_level($downconcrete[0]->side_erosion,$downconcrete[0]->side_subsidence ,$downconcrete[0]->side_cracking ,$downconcrete[0]->side_obstruction , $downconcrete[0]->side_hole , $downconcrete[0]->side_leak ,$downconcrete[0]->side_movement ,$downconcrete[0]->side_drainage ,$downconcrete[0]->side_weed );
            // 4.3
                $level_downconcrete_3=cal_level($downconcrete[0]->flrblock_erosion,$downconcrete[0]->flrblock_subsidence ,$downconcrete[0]->flrblock_cracking ,$downconcrete[0]->flrblock_obstruction , $downconcrete[0]->flrblock_hole , $downconcrete[0]->flrblock_leak ,$downconcrete[0]->flrblock_movement ,$downconcrete[0]->flrblock_drainage ,$downconcrete[0]->flrblock_weed );
            // 4.4
                $level_downconcrete_4=cal_level($downconcrete[0]->endsill_erosion,$downconcrete[0]->endsill_subsidence ,$downconcrete[0]->endsill_cracking ,$downconcrete[0]->endsill_obstruction , $downconcrete[0]->endsill_hole , $downconcrete[0]->endsill_leak ,$downconcrete[0]->endsill_movement ,$downconcrete[0]->endsill_drainage ,$downconcrete[0]->endsill_weed );
            // --- Avg 4
                $damage[4]= score(($level_downconcrete_1[1]+ $level_downconcrete_2[1] +  $level_downconcrete_3[1] + $level_downconcrete_4[1] )/ ($level_downconcrete_1[0]+ $level_downconcrete_2[0]+  $level_downconcrete_3[0] + $level_downconcrete_4[0]));
            
            // 5.1 downprotection
                $level_downprotection_1=cal_level($downprotection[0]->floor_erosion,$downprotection[0]->floor_subsidence ,$downprotection[0]->floor_cracking ,$downprotection[0]->floor_obstruction , $downprotection[0]->floor_hole , $downprotection[0]->floor_leak ,$downprotection[0]->floor_movement ,$downprotection[0]->floor_drainage ,$downprotection[0]->floor_weed );
            // 5.2
                $level_downprotection_2=cal_level($downprotection[0]->side_erosion,$downprotection[0]->side_subsidence ,$downprotection[0]->side_cracking ,$downprotection[0]->side_obstruction , $downprotection[0]->side_hole , $downprotection[0]->side_leak ,$downprotection[0]->side_movement ,$downprotection[0]->side_drainage ,$downprotection[0]->side_weed );
            // --- Avg 5
                $damage[5]= score(($level_downprotection_1[1]+ $level_downprotection_2[1] )/ ($level_downprotection_1[0]+ $level_downprotection_2[0]));
            
            // 6.1 waterdelivery
                $level_waterdelivery_1=cal_level($waterdelivery[0]->floor_erosion,$waterdelivery[0]->floor_subsidence ,$waterdelivery[0]->floor_cracking ,$waterdelivery[0]->floor_obstruction , $waterdelivery[0]->floor_hole , $waterdelivery[0]->floor_leak ,$waterdelivery[0]->floor_movement ,$waterdelivery[0]->floor_drainage ,$waterdelivery[0]->floor_weed );
            // 6.2
                $level_waterdelivery_2=cal_level($waterdelivery[0]->side_erosion,$waterdelivery[0]->side_subsidence ,$waterdelivery[0]->side_cracking ,$waterdelivery[0]->side_obstruction , $waterdelivery[0]->side_hole , $waterdelivery[0]->side_leak ,$waterdelivery[0]->side_movement ,$waterdelivery[0]->side_drainage ,$waterdelivery[0]->side_weed );
            // 6.3
                $level_waterdelivery_3=cal_level($waterdelivery[0]->gate_erosion,$waterdelivery[0]->gate_subsidence ,$waterdelivery[0]->gate_cracking ,$waterdelivery[0]->gate_obstruction , $waterdelivery[0]->gate_hole , $waterdelivery[0]->gate_leak ,$waterdelivery[0]->gate_movement ,$waterdelivery[0]->gate_drainage ,$waterdelivery[0]->gate_weed );
            // --- Avg 6
                $damage[6]= score(($level_waterdelivery_1[1]+ $level_waterdelivery_2[1]+$level_waterdelivery_3[1] )/ ($level_waterdelivery_1[0]+ $level_waterdelivery_2[0]+$level_waterdelivery_3[0]));
        // ------------
        // $water_area="ข้อมูลพื้นที่รับน้ำของฝาย\n"."A = ".$area[0]->area." ตารางกิโลเมตร \n"."L = ".$area[0]->L." กิโลเมตร\n"."LC = ".$area[0]->LC." กิโลเมตร\n";

        
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
        // $pdf = PDF::loadView('test_pdf02',compact("weir"));
        return $pdf->stream($name); 
        // $content = $pdf->download()->getOriginalContent();
        // Storage::put('public/pdf/test.pdf',$content);
        // return Storage::response('public/pdf/test.pdf');
        // return view('guest.pdf'); 

    }

    public function reportpdf_warning($weir_id=0) {
        return view('guest.warning'); 
        
    }
}
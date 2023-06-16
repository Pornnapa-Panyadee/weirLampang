<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face{
        font-family:  'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        body{
        font-family: "THSarabunNew";
        font-size: 14px;
        line-height:1;
        }
        @page {
            size: A4;
            padding: 10px;
            }
        @media print {
            html, body {
                width: 210mm;
                height: 300mm;
                /*font-size : 16px;*/
            }
        }
        html { margin-bottom: 0px}
        div.text06 {
            text-align:left;
            padding-top: -10px;
            line-height: 1;
        
        }div.text {
                padding-top: -10px;
                line-height: 1;
                font-size: 16px;
        }
        .text_head{
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            margin-top: 5px;
            line-height:70%;
        }
        div.text01 {
            text-align:left;
            padding-top: -10px;
            line-height: 1;
        }.text2{
            font-size: 14px;
            text-align: center;
            font-weight: bold;
            margin-top: 5px;
            line-height:70%;
            
        }.text3{
            font-size: 14px;
            font-weight: bold;
            line-height:1;
            margin-top:-5px;
        }.text4{
            font-size: 13px;
            line-height:1;
            margin-left: 5px;
            padding-left: 5px;
            position:absolute;
        }table { 
            width:100%;
            background-color:transparent;
            border-collapse: collapse;
            text-align: center;
            -fs-table-paginate: paginate;
        }tr,td { 
            padding-top:-10px;
        }#customers {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
            text-align:left;
        }
        #customers td, #customers th {
            padding-left: 4px;
        }#customers th {
            border: 1px solid;
        }.headname{
            margin-top:-40px;
        }.table1{
            text-align: left;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }.table3{
            font-size:14px;
            text-align: left;
        }.table5{
            font-size:14px;
            text-align: left;
            width: 100%;
        }
        .table4{
            font-size:14px;
            text-align: left;
            border-collapse: collapse;
            border: 1px solid black;
        }       
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;
            color:#000;
            text-align: right;
            line-height: 1.5cm;
            content: counter(page);
        }
        
        
    </style>
    <style>
       .ck{
            margin: 2px 3px 0 3px;
        }.text_table{
            margin-left: 5px;
            padding-left: 5px;
            position:absolute;
        }
        .detail_img{
            width: 80%;
            margin: 2px 0 0 12px;
            text-align: center;
            position:absolute;
        }
        .page-break {
            page-break-after: always;
        }
        .customers {
            border-collapse: collapse;
            border: 4px solid #fff;
            border-color: #fff;
        }
        
    </style>
 </head>
    <body>
        <div class="row" align="center" style=" margin-top:30px;"> 
            <table align="center" class="customers" width="80%">
                <tr >
                    <td width="20%" class="customers"><img src="{{ asset('images/footer/cr.png') }}" width="80%"></td>
                    <td width="60%" class="customers"><font style="font-size:70px;"><b>รายงานสรุป</b></font></td>
                    <td width="20%" class="customers"><img src="{{ asset('images/footer/cmu.png') }}" width="100%"></td>
                </tr>
                <tr>
                    <td colspan="3" height=100px; class="customers"> <font style="font-size:42px;"><b>ข้อมูลสภาพปัญหาและแนวทางแก้ไขปัญหาเบื้องต้นของฝาย</b></td>
                </tr>
                <tr>
                    <td colspan="3" height=500px; class="customers"> <font style="font-size:60px;"><b>{{$text_tm}} <br> {{$text_amp}} จังหวัดเชียงราย</b></td>
                </tr>
                <tr>
                    <td colspan="3" class="customers"> <font style="font-size:24px;"><b>โครงการพัฒนาระบบสารสนเทศการตรวจประเมินสภาพฝายและวางแผนปรับปรุงเพิ่มประสิทธิภาพฝาย<b></td>
                </tr>
                <tr>
                    <td colspan="3" class="customers"> <font style="font-size:24px;"><b>ในพื้นที่จังหวัดเชียงราย<b></td>
                </tr>
                <tr>
                    <td colspan="3" height=100px;> <font style="font-size:24px;"><b>โดย สำนักงานป้องกันบรรเทาสาธารณภัยเชียงรายร่วมกับมหาวิทยาลัยเชียงใหม่<b></td>
                </tr>
            </table>
          

        </div>
        <footer>
            หมายเหตุ ข้อมูลใช้เพื่อการศึกษาวางแผน ไม่สามารถใช้อ้างอิงทางกฎหมายและคดีความ
        </footer>
        <?php 
            function checkphoto($text){
                if($text!=NULL){
                    $img='http://weir.crflood.com/'.$text;
                    echo "<img src='{$img}'  width=140px; style='margin:8px 0 0px 20px;'>";
                }else{ echo "&nbsp; ";}	
            }
            function checkphoto1($text){
                if($text!=NULL){
                    $img='http://weir.crflood.com/'.$text;
                    echo "<img src='{$img}'  width=140px; style='margin:-24px 0 10px 20px;'>";
                    // echo "<img src='{$img}'  width=50%; style='margin:4px 0 20px 20px; padding-top:-14px;position: absolute;'>";
                }else{ echo "";}	
            }
            function checkCuase($text) {
                if($text!=NULL){
                    echo $text;	
                }else{
                    echo "-";	
                }
            }
            function checkhas($text) {
                if($text==1){
                echo "มี";	
            }else{
                    echo "ไม่มี";	
            } 
            }
            function check_score($s){
                if($s==1){ $text=['https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/check.png'];}
                elseif($s==2){ $text=['https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/check.png','https://survey.crflood.com/images/logo/square.png'] ;}
                elseif($s==3){ $text=['https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/check.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png'] ;}
                else{ $text=['https://survey.crflood.com/images/logo/check.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png','https://survey.crflood.com/images/logo/square.png'] ; }
                return $text;
            }
            function checkpixhas($text,$t,$s) {
                // $img='https://survey.crflood.com/images/logo/square.png';
                // $img1='https://survey.crflood.com/images/logo/check.png';
                $sc = check_score($s);
                if($text<2){
                    if($t!=NULL){
                        echo "<img class='ck' src='{$sc[0]}'width=12px;>ดี<img class='ck' src='{$sc[1]}'width=12px; class='ck'>ค่อนข้างดี<img class='ck' src='{$sc[2]}' width=12px;>ปานกลาง<img class='ck' src='{$sc[3]}'  width=12px;>ทรุดโทรม";	
                    }else{
                        echo "ไม่มี";
                    }
                    
                }else{
                        echo "<img class='ck' src='{$sc[0]}'width=12px;>ดี<img class='ck' src='{$sc[1]}'width=12px; class='ck'>ค่อนข้างดี<img class='ck' src='{$sc[2]}' width=12px;>ปานกลาง<img class='ck' src='{$sc[3]}'  width=12px;>ทรุดโทรม";	
                }
            }
        
        if($num==0){ ?> 
            <div class="page-break"></div>
            <center><h2> - - - - - ไม่มีข้อมูล - - - - -  </h2></center>
        <?php }
        
        for($i=0;$i<$num;$i++){ ?>
            <div class="page-break"></div>
            <div class="headname">
            <table >
                <tr>
                    <td><img src="{{ asset('images/icon/cr.png') }}" width="8%"></td>
                    <td>
                        <div class="text_head"> การตรวจสภาพฝายและแนวทางแก้ไขปรับปรุงเพื่อเพิ่มประสิทธิภาพฝาย ในพื้นที่จังหวัดเชียงราย</div>
                    </td>
                    <td><img src="{{ asset('images/icon/cmu.png') }}" width="10%"></td>
                </tr>
            </table>
            <div class="row justify-content-end" align="right" style="margin-top:-5px;"><div class="col-2">รหัสฝายที่ : {{$result[$i]['weir'][0]['weir_code']}} </div> </div>
                <?php 
                    $level=["น้อย","ปานกลาง","มาก"];
                    $code=str_split($result[$i]['weir'][0]->weir_code );
                    $text= explode(" ",$result[$i]['location'][0]->weir_village);
                    $moo = $text[1];
                    $tambol=$text[2];
                    $s_lat=str_split($result[$i]['locationUTM']->x);
                    $s_lng=str_split($result[$i]['locationUTM']->y);
                
                ?>
            
            <div class="text06">
                <table style="text-align:left;">
                    <tr>
                        <td width="20%">ชื่อฝาย : {{ $result[$i]['weir'][0]->weir_name}} </td>
                        <td width="15%">ชื่อลำน้ำ : &nbsp;&nbsp;{{ $result[$i]['river'][0]->river_name}} </td>
                        <td width="20%">ลำน้ำสาขาของ : &nbsp;&nbsp;{{ $result[$i]['river'][0]->river_branch	}} </td>
                        <td width="15%">ประเภทลำน้ำ :  &nbsp;&nbsp;{{ $result[$i]['river'][0]->river_type}} </td> 
                        <td width="20%"> วันที่สำรวจ :  &nbsp;&nbsp;{{ $result[$i]['date']}}</td>
                    </tr>
                </table>
                <table style="text-align:left;">
                    <tr>
                        <td width="30%">หมู่บ้าน : หมู่ที่ &nbsp;{{$moo}}&nbsp;{{$tambol}}</td>
                        <td width="15%">ตำบล : &nbsp;{{$result[$i]['location'][0]->weir_tumbol}}</td>
                        <td width="15%">อำเภอ : &nbsp;{{$result[$i]['location'][0]->weir_district}}</td>
                        <td width="15%">จังหวัด : &nbsp;เชียงราย</td>
                        <td  >&nbsp;</td>
                    </tr>
                </table>
                <table style="text-align:left;">
                    <tr>
                        <td width="18%">ก่อสร้าง เมื่อปี พ.ศ. : &nbsp;{{ $result[$i]['weir'][0]->weir_build}}</td>
                        <td width="20%">อายุฝาย : &nbsp;{{ $result[$i]['weir'][0]->weir_age}}</td>
                        <td width="30%"> หน่วยงานรับผิดชอบ : &nbsp;{{checkCuase($result[$i]['weir'][0]->resp_name)}} </td>
                        <td> {{$result[$i]['model_text']['text3']."  ".$result[$i]['model_text']['text1']." ".$result[$i]['model_text']['text2']}}</td>
                    </tr>
                </table>
            </div>
            <div class="text">
                <table class="table" border=1 >
                    <thead>
                        <tr>
                        <th colspan="4" class="text-center" style="background-color:#C0C0C0">พิกัดฝาย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="line-height: 12px; ">
                            <td width="15%">X(UTM)</td>
                            <td width="35%">{{$result[$i]['locationUTM']->x}}</td>
                            <td width="15%">Y(UTM)</td>
                            <td width="35%">{{$result[$i]['locationUTM']->y}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text" style="margin-top:3px;">
                <table id="customers" >
                    <tr align="center"><th colspan="5" class="text-center" style="background-color:#C0C0C0">ลักษณะทั่วไป</th></tr>
                    <tr>
                        <td colspan="2"> <b>ประเภทของสันฝาย : </b>  &nbsp;{{$result[$i]['space'][0]->ridge_type->type}} </td>
                        <td >ความสูงชัน :  &nbsp;{{$result[$i]['space'][0]->ridge_height}}  &nbsp;เมตร</td>
                        <td colspan="2">ความกว้างสัน :  &nbsp;{{$result[$i]['space'][0]->ridge_width}}  &nbsp;เมตร</td>
                    </tr>
                    <tr>
                        <td  > <b>ประตูระบายน้ำ : </b>  &nbsp;{{checkhas($result[$i]['space'][0]->gate_has)}} </td>
                        <?php if($result[$i]['space'][0]->gate_machanic_type!=NULL){ ?> 
                            <td >ชนิดบานประตู :  &nbsp;{{checkCuase($result[$i]['space'][0]->gate_type)}} </td>
                            <td >ขนาด (กว้าง*สูง) : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_dimension->size)}}</td>
                            <td >จำนวน : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_dimension->num)}}&nbsp;ชุด</td>
                            <td>ชนิดเครื่องยกบาน : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_machanic_type)}}</td>
                        <?php } else{?>
                            <td colspan="4">ชนิดบานประตู :  &nbsp;{{checkCuase($result[$i]['space'][0]->gate_type)}}  &nbsp; &nbsp; &nbsp;
                            ขนาด (กว้าง*สูง) : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_dimension->size)}} &nbsp; &nbsp; &nbsp;
                            จำนวน : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_dimension->num)}}&nbsp;ชุด &nbsp; &nbsp; &nbsp;
                            ชนิดเครื่องยกบาน : &nbsp; {{checkCuase($result[$i]['space'][0]->gate_machanic_type)}}</td>
                        <?php }?>
                        
                        
                    </tr>
                    <tr>
                        <td > <b>อาคารบังคับน้ำ : </b>  &nbsp;{{checkhas($result[$i]['space'][0]->control_building_has)}} </td>
                        <td >{{$result[$i]['building']['side']}} </td>
                        <td >{{$result[$i]['building']['text1']}} </td>
                        <?php if($result[$i]['building']['text3']!=NULL){?> 
                            <td>{{$result[$i]['building']['text2']}} </td>
                            <td >{{$result[$i]['building']['text3']}} </td>
                        <?php }else{ ?>
                            <td colspan="2">{{$result[$i]['building']['text2']}} </td>
                        <?php } ?>

                    </tr>

                    <tr>
                        <td > <b>ระบบส่งน้ำ : </b> {{checkhas($result[$i]['space'][0]->canal_has)}} </td>
                        <td >ลักษณะคลอง :{{checkCuase($result[$i]['space'][0]->canal_type)}} </td>
                        <td >ขนาดกันคลองกว้าง : {{checkCuase($result[$i]['space'][0]->canel_dimension->width)}}&nbsp;เมตร</td>
                        <td colspan="2">ความยาวประมาณ : {{checkCuase($result[$i]['space'][0]->canel_dimension->lenght)}}&nbsp;กิโลเมตรเมตร</td>
                    </tr>
                    <tr>
                        <td colspan="5"> <b>ข้อมูลประวัติการซ่อม : </b>  &nbsp;</td>
                    </tr>
                    <tr align="center" style="background-color:#C0C0C0">
                        <th>ปี พ.ศ.</th>
                        <th colspan="2">รายการซ่อม</th>
                        <th>หน่วยงาน</th>
                        <th >หมายเหตุ</th>
                    </tr>
                    <?php 
                        if($result[$i]['mt']==1){$c=1;}
                        else{$c=$result[$i]['mt']-1;}
                        for($y=0;$y<$c;$y++){ ?>
                        <tr style="line-height: 12px; text-align:center;">
                            <td style="border: 1px solid;">{{$result[$i]['maintain'][$y]['maintain_date']}}&nbsp;</td>
                            <td colspan="2" style="border: 1px solid;">{{$result[$i]['maintain'][$y]['maintain_detail']}}&nbsp;</td>
                            <td style="border: 1px solid;">{{$result[$i]['maintain'][$y]['maintain_resp']}}&nbsp;</td>
                            <td  style="border: 1px solid;">{{$result[$i]['maintain'][$y]['maintain_remark']}}&nbsp;</td>
                        </tr>  
                    <?php } ?>
                </table>
            </div>

            <div class="text">
                <div class="text3">ผลการตรวจสอบสภาพฝาย </div>
                    <table class="table3" border=1>
                        <tr align="center"><th colspan="4" class="text-center" style="background-color:#C0C0C0">สภาพฝายของแต่ละองค์ประกอบ (Element)</th></tr>
                        <tr style="background-color:#DFDFDF">
                            <td width="40%">1.ส่วนป้องกันเหนือน้ำ: {{checkpixhas(count($result[$i]['photo1']),$result[$i]['photo1'][0]["file"],$result[$i]['damage'][0])}} </td>
                            <td style="text-align:center;" width="10%">{{$result[$i]['sediment']['check1']}}</td>
                            <td width="40%">2.ส่วนเหนือน้ำ: {{checkpixhas(count($result[$i]['photo2']),$result[$i]['photo2'][0]["file"],$result[$i]['damage'][1])}}</td>
                            <td style="text-align:center;" width="10%">{{$result[$i]['sediment']['check2']}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height:72px;" ><br>
                                <?php 
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo1'][$j]["file"])}}
                                <?php } ?>
                            </td>
                            <td colspan="2" style="height:72px;"><br>
                                <?php 
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo2'][$j]["file"])}}
                                <?php } ?>
                            </td>
                        </tr>
                        <!--  -->
                        <tr  style="background-color:#DFDFDF" >
                            <td colspan="2">3.ส่วนควบคุมน้ำ:{{checkpixhas(count($result[$i]['photo3']),$result[$i]['photo3'][0]["file"],$result[$i]['damage'][2])}}</td>
                            <td>4.ส่วนท้ายน้ำ:{{checkpixhas(count($result[$i]['photo4']),$result[$i]['photo4'][0]["file"],$result[$i]['damage'][3])}}</td>
                            <td style="text-align:center;" width="10%">{{$result[$i]['sediment']['check4']}}</td>
                        </tr>
                        <tr>
                            <td style="height:72px;" colspan="2"> <br>
                                
                                <?php 
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo3'][$j]["file"])}}
                                <?php } ?>
                            </td>

                            <td style="height:72px;" colspan="2"><br>
                                <?php  
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo4'][$j]["file"])}}
                                <?php } ?>
                            </td>
                        </tr>
                        <!--  -->
                        <tr style="background-color:#DFDFDF">
                            <td >5.ส่วนป้องกันท้ายน้ำ:{{checkpixhas(count($result[$i]['photo5']),$result[$i]['photo5'][0]["file"],$result[$i]['damage'][4])}}</td>
                            <td style="text-align:center;" width="10%">{{$result[$i]['sediment']['check5']}}</td>
                            <td >6.ระบบส่งน้ำ:{{checkpixhas(count($result[$i]['photo6']),$result[$i]['photo6'][0]["file"],$result[$i]['damage'][5])}}</td>
                            <td style="text-align:center;" width="10%">{{$result[$i]['sediment']['check6']}}</td>
                        </tr>
                        <tr>
                            <td style="height:72px;" colspan="2"><br>
                                <?php 
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo5'][$j]["file"])}}
                                <?php } ?>
                            </td>
                            <td style="height:72px;" colspan="2"><br>
                                <?php  
                                    for($j=0;$j<2;$j++){?>
                                    {{checkphoto($result[$i]['photo6'][$j]["file"])}}
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
            </div>
            <?php if( (strlen($result[$i]['expert'][0]->weir_problem)+strlen($result[$i]['expert'][0]->weir_solution))>2250){ ?> 
                <div class="page-break"></div>
            <?php } ?>

            <div class="text">
                    <table class="table5" border=1 style="margin-top:3px;">                   
                        <tr>
                            <th style="background-color:#C0C0C0; text-align:center" width="50%" colspan="2">พื้นที่รับน้ำของฝายและข้อมูลประกอบ </th>
                            <th style="background-color:#C0C0C0; text-align:center" width="50%">สภาพโดยรวมของฝายและแนวทางแก้ไขปรับปรุงเบื้องต้น </th>
                        </tr>
                        <tr>
                            <?php $url = "http://weir.crflood.com//images/map/".$result[$i]['location'][0]->weir_district."/".$result[$i]['weir'][0]['weir_code'].".jpg";
                                if(@is_array(getimagesize($url))){ ?> 
                                    <td  width="25%"><img src='{{$url}}'  class="detail_img"> </td>
                                <?php } else{ ?>
                                    <td>&nbsp; </td>
                                <?php } ?>
                            
                            <td  width="25%" valign="top" class="text_table"> 
                                <u>ข้อมูลพื้นที่รับน้ำของฝาย</u><br>
                                A = {{number_format($result[$i]['area'][0]->area, 1, '.', '') }}  ตารางกิโลเมตร <BR>
                                L = {{number_format($result[$i]['area'][0]->L, 1, '.', '') }}  กิโลเมตร <BR>
                                LC = {{number_format($result[$i]['area'][0]->LC, 1, '.', '') }} กิโลเมตร <BR>
                                H = {{$result[$i]['area'][0]->H}} เมตร <BR>
                                s = {{$result[$i]['area'][0]->S}}  <BR>
                                

                                <?php if(number_format($result[$i]['area'][0]->area, 1, '.', '') < 25){?>
                                    c = {{$result[$i]['area'][0]->c}} <BR>
                                    I = {{$result[$i]['area'][0]->I}} มิลลิเมตร/ชั่งโมง <BR>
                                    Return period = {{$result[$i]['area'][0]->Return_period}} ปี <BR>
                                    อัตราการไหลสูงสุด  = {{number_format($result[$i]['area'][0]->flow, 0, '.', '') }} ลบ.ม./วินาที
                                <?php } else{ ?> 
                                    Return period = {{$result[$i]['area'][0]->Return_period}} ปี <BR>
                                    อัตราการไหลสูงสุด  = {{number_format($result[$i]['area'][0]->flow, 0, '.', '') }} ลบ.ม./วินาที
                                    <BR><BR><BR><BR>
                                <?php } ?> 

                            </td>
                            <td valign="top" class="text4">
                                <b>สภาพโดยรวมของฝาย  </b> <br> 
                                {{$result[$i]['expert'][0]->weir_problem}} <br>
                                <b>แนวทางแก้ไขปรับปรุงเบื้องต้น  </b> <br> 
                                {{$result[$i]['expert'][0]->weir_solution}}
                            </td>
                        </tr>
                    </table>
            </div>
            
            
        </div>
            
        <?php } ?> 
    </body>
</html>

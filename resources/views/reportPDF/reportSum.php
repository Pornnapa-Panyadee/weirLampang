<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face{
        font-family:  'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabunNew.ttf')}}") format('truetype');
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
        div.text01 {
            text-align:left;
            padding-top: -10px;
            line-height: 1;
        }.texthead{
            font-size: 14px;
            text-align: center;
            font-weight: bold;
            margin-top: 5px;
            line-height:90%;
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
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            text-align:left;
        }
        #customers td, #customers th {
            padding-left: 4px;
        }#customers th {
            border: 1px solid ;
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
            margin: 2px 3px 0 2px;
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
        
    </style>
 </head>
    <body>
        <footer>
            หมายเหตุ ข้อมูลใช้เพื่อการศึกษาวางแผน ไม่สามารถใช้อ้างอิงทางกฎหมายและคดีความ
        </footer>
        <div class="headname">
            <table >
                <tr>
                    <td width="20%" align="right" >
                        <img src='images/footer/lampang.png' width="30px" style="margin-top:20px;">
                        <img src='images/footer/egat.jpg' width="50px">
                        
                    </td>
                    <td width="60%">
                        <div class="texthead"> การตรวจสภาพฝายและแนวทางแก้ไขปรับปรุงเพื่อเพิ่มประสิทธิภาพฝาย ในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</div>
                    </td>
                    <td width="20%" align="left">
                        <img src='images/footer/cmu.png' width="30px"></td>
                    </td>    
                    
                </tr>
            </table>
            <div class="row justify-content-end" align="right"><div class="col-2">รหัสฝายที่ : <?php echo  $weir[0]['weir_code']; ?> </div> </div>
            <?php 
                $level=["น้อย","ปานกลาง","มาก"];
                $code=str_split($weir[0]->weir_code );
                $text= explode(" ",$location[0]->weir_village);
                $moo = $text[1];
                $tambol=$text[2];
                $s_lat=str_split($locationUTM->x);
                $s_lng=str_split($locationUTM->y);
                $countPhoto1 = count($photo1);
                $countPhoto2 = count($photo2);
                $countPhoto3 = count($photo3);
                $countPhoto4 = count($photo4);
                $countPhoto5 = count($photo5);
                $countPhoto6 = count($photo6);
                function checkphoto($text){
                    if($text!=NULL){
                        $img=$text;
                        echo "<img src='{$img}'  width=140px; style='margin:8px 0 -10px 20px;'>";
                    }else{ echo "";}	
                }
                function checkphoto1($text){
                    if($text!=NULL){
                        $img=$text;
                        echo "<img src='{$img}'  width=140px; style='margin:-14px 0 0px 20px;'>";
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
                function checkpair($text,$i) {
                    if($i==$text){echo "<img src='images/logo/check.png'  width=12px;>";	
                    }else{ echo "<img src='images/logo/square.png'  width=12px;>";	
                } 
            }

            ?>
            
            <div class="text06">
                <table style="text-align:left;">
                    <tr>
                        <td width="20%">ชื่อฝาย : <?php  echo($weir[0]->weir_name) ; ?> </td>
                        <td width="15%">ชื่อลำน้ำ : &nbsp;&nbsp;<?php  echo($river[0]->river_name); ?> </td>
                        <td width="20%">ลำน้ำสาขาของ : &nbsp;&nbsp;<?php echo($river[0]->river_branch); ?> </td>
                        <td width="15%">ประเภทลำน้ำ :  &nbsp;&nbsp;<?php echo($river[0]->river_type); ?> </td> 
                        <td width="20%"> วันที่สำรวจ :  &nbsp;&nbsp;<?php echo($date) ; ?></td>
                    </tr>
                </table>
                <table style="text-align:left;">
                    <tr>
                        <td width="20%">หมู่บ้าน : หมู่ที่ &nbsp;<?php echo $moo; ?>&nbsp;<?php echo $tambol; ?></td>
                        <td width="15%">ตำบล : &nbsp;<?php echo $location[0]->weir_tumbol; ?></td>
                        <td width="15%">อำเภอ : &nbsp;<?php echo $location[0]->weir_district; ?></td>
                        <td width="15%">จังหวัด : &nbsp;ลำปาง</td>
                        <td  >&nbsp;</td>
                    </tr>
                </table>
                <table style="text-align:left;">
                    <tr>
                        <td width="18%">ก่อสร้าง เมื่อปี พ.ศ. : &nbsp;<?php echo $weir[0]->weir_build; ?></td>
                        <td width="20%">อายุฝาย : &nbsp;<?php echo $weir[0]->weir_age; ?></td>
                        <td width="25%"> หน่วยงานรับผิดชอบ : &nbsp;<?php echo checkCuase($weir[0]->resp_name); ?> </td>
                        <td> <?php echo ( $model_text['text3']."  ".$model_text['text1']." ".$model_text['text2']); ?></td>
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
                        <tr>
                            <td width="15%">X(UTM)</td>
                            <td width="35%"><?php echo $locationUTM->x; ?></td>
                            <td width="15%">Y(UTM)</td>
                            <td width="35%"><?php echo $locationUTM->y; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text" style="margin-top:3px;">
                <table id="customers" >
                    <tr align="center"><th colspan="5" class="text-center" style="background-color:#C0C0C0">ลักษณะทั่วไป</th></tr>
                    <tr>
                        <td colspan="2"> <b>ประเภทของสันฝาย : </b>  &nbsp;<?php echo $space[0]->ridge_type->type; ?> </td>
                        <td >ความสูงชัน :  &nbsp;<?php echo $space[0]->ridge_height; ?>  &nbsp;เมตร</td>
                        <td colspan="2">ความกว้างสัน :  &nbsp;<?php echo $space[0]->ridge_width; ?>  &nbsp;เมตร</td>
                    </tr>
                    <tr>
                        <td > <b>ประตูระบายน้ำ : </b>  &nbsp;<?php echo(checkhas($space[0]->gate_has)); ?> </td>
                        <td >ชนิดบานประตู :  &nbsp;<?php echo (checkCuase($space[0]->gate_type)); ?> </td>
                        <td >ขนาด (กว้าง*สูง) : &nbsp; <?php echo (checkCuase($space[0]->gate_dimension->size)) ; ?></td>
                        <td >จำนวน : &nbsp; <?php echo(checkCuase($space[0]->gate_dimension->num)); ?>&nbsp;ชุด</td>
                        <td>ชนิดเครื่องยกบาน : &nbsp; <?php echo (checkCuase($space[0]->gate_machanic_type)); ?></td>
                    </tr>
                    <tr>
                        <td > <b>อาคารบังคับน้ำ : </b>  &nbsp;<?php echo(checkhas($space[0]->control_building_has)); ?> </td>
                        <td ><?php echo $building['side']; ?> </td>
                        <td ><?php echo $building['text1']; ?> </td>
                        <td><?php echo $building['text2']; ?> </td>
                        <td ><?php echo $building['text3']; ?> </td>
                    </tr>

                    <tr>
                        <td > <b>ระบบส่งน้ำ : </b>  &nbsp;<?php echo checkhas($space[0]->canal_has); ?> </td>
                        <td >ลักษณะคลอง :  &nbsp;<?php echo checkCuase($space[0]->canal_type); ?> </td>
                        <td >ขนาดกันคลองกว้าง : &nbsp; <?php echo checkCuase($space[0]->canel_dimension->width); ?>&nbsp;เมตร</td>
                        <td colspan="2">ความยาวประมาณ : &nbsp; <?php echo checkCuase($space[0]->canel_dimension->lenght); ?>&nbsp;กิโลเมตรเมตร</td>
                    </tr>
                    <tr>
                        <td colspan="5"> <b>ข้อมูลประวัติการซ่อม : </b>  &nbsp;</td>
                    </tr>
                    <tr align="center" style="background-color:#C0C0C0">
                        <th>ปี พ.ศ.</th>
                        <th>รายการซ่อม</th>
                        <th>หน่วยงาน</th>
                        <th colspan="2">หมายเหตุ</th>
                    </tr>
                    <?php for($i=0;$i<$mt;$i++){ ?>
                        <tr >
                            <td style="border: 1px solid;"><?php echo $maintain[$i]['maintain_date']; ?>&nbsp;</td>
                            <td style="border: 1px solid;"><?php echo $maintain[$i]['maintain_detail']; ?>&nbsp;</td>
                            <td style="border: 1px solid;"><?php echo $maintain[$i]['maintain_resp']; ?>&nbsp;</td>
                            <td colspan="2" style="border: 1px solid;"><?php echo $maintain[$i]['maintain_remark']; ?>&nbsp;</td>
                        </tr>  
                    <?php  } ?>
                </table>
            </div>

            <div class="text">
                <div class="text3">ผลการตรวจสอบสภาพฝาย </div>
                    <table class="table3" border=1>
                        <tr align="center"><th colspan="4" class="text-center" style="background-color:#C0C0C0">สภาพฝายของแต่ละองค์ประกอบ (Element)</th></tr>
                        <tr style="background-color:#DFDFDF">
                            <td width="40%">1. ส่วนป้องกันเหนือน้ำ : 
                                <span><?php checkpair(1,$damage[0])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[0])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[0])?> ควรรื้อถอน </span>
                            </td>
                            <td style="text-align:center;" width="10%"><?php echo $sediment['check1']; ?></td>
                            <td width="40%">2. ส่วนเหนือน้ำ   : 
                                <span><?php checkpair(1,$damage[1])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[1])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[1])?> ควรรื้อถอน </span>
                            </td>
                            <td style="text-align:center;" width="10%"><?php echo $sediment['check2']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height:72px;" ><br>
                                <?php  if($countPhoto1==1){?>
                                    <?php echo checkphoto1($photo1[0]["file"]); ?>
                                <?php  }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo1[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                            <td colspan="2" style="height:72px;"><br>
                                <?php if($countPhoto2==1){?>
                                    <?php echo checkphoto1($photo2[0]["file"]); ?>
                                <?php }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo2[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                        </tr>
                        <tr  style="background-color:#DFDFDF" >
                            <td colspan="2">3. ส่วนควบคุมน้ำ :
                                <span><?php checkpair(1,$damage[2])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[2])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[2])?> ควรรื้อถอน </span>
                            </td>
                            <td>4. ส่วนท้ายน้ำ : 
                                <span><?php checkpair(1,$damage[3])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[3])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[3])?> ควรรื้อถอน </span>
                            </td>
                            <td style="text-align:center;" width="10%"><?php echo $sediment['check4']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height:72px;" ><br>
                                <?php  if($countPhoto3==1){?>
                                    <?php echo checkphoto1($photo3[0]["file"]); ?>
                                <?php  }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo3[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                            <td colspan="2" style="height:72px;"><br>
                                <?php if($countPhoto4==1){?>
                                    <?php echo checkphoto1($photo4[0]["file"]); ?>
                                <?php }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo4[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                        </tr>
                        <tr style="background-color:#DFDFDF">
                            <td >5. ส่วนป้องกันท้ายน้ำ : 
                                <span><?php checkpair(1,$damage[4])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[4])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[4])?> ควรรื้อถอน </span>
                            </td>
                            <td style="text-align:center;" width="10%"><?php echo $sediment['check5']; ?></td>
                            <td >6. ระบบส่งน้ำ : 
                                <span><?php checkpair(1,$damage[5])?> ใช้งานได้  </span>
                                <span><?php checkpair(2,$damage[5])?> ควรปรับปรุง  </span>
                                <span><?php checkpair(3,$damage[5])?> ควรรื้อถอน </span>
                            </td>
                            <td style="text-align:center;" width="10%"><?php echo $sediment['check6']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height:72px;" ><br>
                                <?php  if($countPhoto5==1){?>
                                    <?php echo checkphoto1($photo5[0]["file"]); ?>
                                <?php  }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo5[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                            <td colspan="2" style="height:72px;"><br>
                                <?php if($countPhoto6==1){?>
                                    <?php echo checkphoto1($photo6[0]["file"]); ?>
                                <?php }else{ 
                                    for($i=0;$i<2;$i++){?>
                                    <?php echo checkphoto($photo6[$i]["file"]); ?>
                                <?php } }?>
                            </td>
                        </tr>
                       
                    </table>
            </div>
            
            <?php if( (strlen($expert->weir_problem)+strlen($expert->weir_solution))>2000){ ?> 
                <div class="page-break"></div>
            <?php } ?>

            <div class="text">
                    <table class="table5" border=1 style="margin-top:3px;">                   
                        <tr>
                            <th style="background-color:#C0C0C0; text-align:center" width="50%" colspan="2">พื้นที่รับน้ำของฝายและข้อมูลประกอบ </th>
                            <th style="background-color:#C0C0C0; text-align:center" width="50%">สภาพโดยรวมของฝายและแนวทางแก้ไขปรับปรุงเบื้องต้น</th>
                        </tr>
                        <tr>
                            <td  width="25%"><img src='https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/map/<?php echo $location[0]->weir_district; ?>/<?php echo $weir[0]['weir_code']; ?>.jpg'  class="detail_img"> </td>
                            <td valign="top" width="25%" class="text_table"> 
                                <u>ข้อมูลพื้นที่รับน้ำของฝาย</u><br>
                                A = <?php echo $area[0]->area; ?> ตารางกิโลเมตร <BR>
                                L = <?php echo $area[0]->L; ?> กิโลเมตร <BR>
                                LC = <?php echo $area[0]->LC; ?> กิโลเมตร <BR>
                                H = <?php echo $area[0]->H; ?> เมตร <BR>
                                s = <?php echo $area[0]->S; ?>  <BR>
                                <?php if($area[0]->area<25){?>
                                    c = <?php echo $area[0]->c; ?> <BR>
                                    I = <?php echo $area[0]->I; ?> มิลลิเมตร/ชั่วโมง <BR>
                                    Return period = <?php echo $area[0]->Return_period; ?> ปี <BR>
                                    อัตราการไหลสูงสุด  = <?php echo $area[0]->flow; ?> ลบ.ม./วินาที
                                <?php } else{ ?> 
                                    Return period = <?php echo $area[0]->Return_period; ?> ปี <BR>
                                    อัตราการไหลสูงสุด  = <?php echo $area[0]->flow; ?> ลบ.ม./วินาที
                                    <BR><BR><BR><BR>
                                <?php } ?>                                
                                

                            </td>
                            <td valign="top" class="text4">
                                <b>สภาพโดยรวมของฝาย  </b> <br> 
                                <?php echo $expert->weir_problem; ?> <br>
                                <b>แนวทางแก้ไขปรับปรุงเบื้องต้น  </b> <br> 
                                <?php echo $expert->weir_solution; ?>
                            </td>
                        </tr>
                    </table>
            </div>
          
           
            
            
        </div>
    </body>
</html>

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
                function check_score($s){
                    if($s==1){ $text=['https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/check.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png'];}
                    elseif($s==2){ $text=['https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/check.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png'] ;}
                    elseif($s==3){ $text=['https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/check.png'] ;}
                    else{ $text=['https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png','https://watercenter.scmc.cmu.ac.th/weir/jang_basin/images/logo/square.png'] ; }
                    return $text;
                }
                function checkpixhas($text,$t,$s) {
                    $sc = check_score($s);
                    if($text<2){
                        if($t!=NULL){
                            echo "<img class='ck' src='{$sc[0]}'width=12px;> ใช้งานได้ <img class='ck' src='{$sc[1]}'width=12px; class='ck'>ควรปรับปรุง<img class='ck' src='{$sc[2]}' width=12px;>ควรรื้อถอน";	
                        }else{
                            echo "ไม่มี";
                        }
                    }else{
                            echo "<img class='ck' src='{$sc[0]}'width=12px;>ใช้งานได้<img class='ck' src='{$sc[1]}'width=12px; class='ck'>ควรปรับปรุง<img class='ck' src='{$sc[2]}' width=12px;>ควรรื้อถอน";	
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
            


           
            
            
        </div>
    </body>
</html>

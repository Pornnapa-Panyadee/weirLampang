<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <title>Weir CRflood </title>

    <link rel="icon" href="{{ asset('images/icon/favicon1.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('fonts/feather/feather.css')}}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/form/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/icofont.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/buttons.datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/responsive.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/form/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form/waves.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style1.css')}}">

    <!-- leaflet -->
    
    <link rel="stylesheet" href="{{ asset('css/form/leaflet.css')}}" crossorigin=""/>
    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>
    <script src="{{ asset('js/leaflet-src.js')}}"  crossorigin=""></script>

    <style type="text/css">
      #map{

        font-family: Mitr, sans-serif;
        height: 760px;
        display: block;
              margin: auto;
              text-align: left;
              font-size: 14px;
      }
      #map.table {
        font-family: 'Mitr', sans-serif;
        width: 100%;
      }#map.tr {
        padding: 15px;
        text-align: right;
      }#map.td {
        padding: 15px;
        text-align: right;
        }
        select{
            width: 100%;
            height: 40px;
        }
        button.btn {
            width: 100%;
        }
        @media only screen and (max-width:480px) {
            #map{
                height: 450px;
                font-size: 14px;
            }
            table{
                font-size: 2vw;
            }
            select{
            width: 100%;
            height: 40px;
            }
            button.btn{
            width: 100%;
            }
            .btn-sm{
                font-size: 2vw;
            }
        }
      #fix-header{
        font-size:16px;
      }
      th{
        text-align:center;
      }
      .btn{
        padding:2px 12px;
      }
      .mapshow {
        border: 6px solid;
        border-color: #425b75;
      }


    </style>


  </head>

  <body class="horizontal-icon-fixed" >
    @yield('content')
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded" >
      <div class="pcoded-overlay-box"></div>
      
      <div class="pcoded-container navbar-wrapper">
        @include('menu.header')

        <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
             @include('menu.slidebar')
            <!-- Map -->
            <div class="pcoded-content">
              <div class="card"><h3></h3></div>
              <div class="pcoded-inner-content">
                <div class="main-body">
                  <div class="page-wrapper">
                    <div class="page-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card table-card">
                            <div class="card-header">
                              <h3>แผนที่แสดงตำแหน่งฝายจำแนกตามสภาพฝาย ในพื้นที่จังหวัดเชียงราย</h3>                              
                              
                              <!-- Map Show -->
                              <div class="card-block p-b-0">
                                <div class="row justify-content-center">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                      <h3><marquee direction="left" loop="1"> &#9873; กรุณา...รอโหลดข้อมูลสักครู่ !!! </marquee></h3>
                                      
                                        <div class="mapshow" id="map" style="width: 100%; " align="center"></div>
                                        <br>
                                        <div class="row justify-content-end"> 
                                          <div class="col col-lg-6">
                                              <img class="ref" src="{{ asset('/images/icon/refmap2.png') }}" align="right" width=100% >
                                          </div>
                                      </div>
                                    </div>
                                </div>
                               
                              </div>

                              <!-- End Map show -->
                              <div class="card" style="margin-top:20px;">
                                <div class="card-block">
                                  <div class="row">
                                    <div class="col-lg-9 col-xl-12">
                                      <div class="sub-title"> <h4> ตารางสรุปผลจำนวนฝายจำแนกตามสภาพฝาย ในพื้นที่จังหวัดเชียงราย </h4> </div>
                                    </div> 
                                  </div>
                                  <div id="tableData">
                                    <div class="dt-responsive table-responsive">
                                      <table id="fix-header" class="table table-striped table-bordered nowrap" width=80% align="center">
                                      <thead>
                                          <tr>
                                            <th rowspan="2" valign="middle">อำเภอ</th>
                                            <th colspan="3">สภาพฝาย (จำนวน) </th>
                                          </tr>
                                          <tr>
                                            <th valign="middle">สภาพดี</th>
                                            <th>สภาพค่อนข้างดี <br> (ซ่อมแซมเล็กน้อย) </th>
                                            <th>สภาพปานกลาง <br> (ควรซ่อมแซม)</th>    
                                            <th>สภาพทรุดโทรม <br> (ซ่อมแซมทันที) </th>                                                                             
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php for($i = 0;$i < count($result);$i++){  ?>
                                          <tr >
                                            <td width=25%>{{$result[$i]['amp']}}</td>
                                            <td width=20% align="center">{{$result[$i]['score_N']}}</td>
                                            <td width=20% align="center">{{$result[$i]['score_Y']}} </td>
                                            <td width=20% align="center">{{$result[$i]['score_O']}} </td>
                                            <td width=20% align="center">{{$result[$i]['score_R']}} </td>
                                          </tr>
                                          <?php } ?>                                              
                                                                                                                                        
                                        </tbody>                                                                    
                                        
                                      </table>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                                         
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                </div>
              </div>

             
            </div>  
          </div>
            @include('menu.foot')
          </div>
          
        </div>

      </div>
    </div>
    
    
    <script src="{{ asset('js/form/jquery.min.js')}}"></script>
    <script src="{{ asset('js/form/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/form/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/form/jquery-i18next.min.js')}}" ></script>
    <script src="{{ asset('js/form/pcoded.min.js')}}" ></script>
    <script src="{{ asset('js/form/menu-hori-fixed.js')}}" ></script>
    <script src="{{ asset('js/form/jquery.mcustomscrollbar.concat.min.js')}}" ></script>
    <script src="{{ asset('js/form/script.js')}}"></script>
    <script async  src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    
    <script src="{{ asset('js/chooselocationHome.js')}}"></script>
    <script src="{{ asset('js/form/rocket-loader.min.js')}}"></script>
  
    <script src="{{ asset('js/form/jquery.datatables2.min.js')}}" ></script>
    <script src="{{ asset('js/form/datatables.buttons.min.js')}}" ></script>

    <script src="{{ asset('js/form/datatables.fixedheader.min.js')}}"></script>

    <script src="{{ asset('js/form/datatables.colreorder.min.js')}}" ></script>
    <script src="{{ asset('js/form/buttons.print.min.js')}}" ></script>
    <script src="{{ asset('js/form/datatables.bootstrap4.min.js')}}" ></script>
    <script src="{{ asset('js/form/datatables.responsive.min.js')}}" ></script>
    <script src="{{ asset('js/form/responsive.bootstrap4.min.js')}}"></script>

    <script src= "{{ asset('js/form/fixed-header-custom.js') }}"></script>

    <script src= "{{ asset('js/form/pcoded.min.js') }}"></script>
    <script src= "{{ asset('js/form/jquery.mcustomscrollbar.concat.min.js') }}"></script>

    <script src= "{{ asset('js/form/script.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" ></script>
  
    <script src="{{ asset('js/form/rocket-loader.min.js')}}" data-cf-settings="ce2668daaac54a74e9f6cdff-|49" defer=""></script>

    
    <!-- Map script -->
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>

    <script type="text/javascript">
      var station1 = new L.LayerGroup();var station2 = new L.LayerGroup();
      var station3 = new L.LayerGroup();var station4 = new L.LayerGroup();
      var station5 = new L.LayerGroup();var station6 = new L.LayerGroup();
      var station7 = new L.LayerGroup();var station8 = new L.LayerGroup();
      var station9 = new L.LayerGroup();var station10 = new L.LayerGroup();
      var station11 = new L.LayerGroup();var station12 = new L.LayerGroup();
      var station13 = new L.LayerGroup();var station14 = new L.LayerGroup();
      var station15 = new L.LayerGroup();var station16 = new L.LayerGroup();
      var station17 = new L.LayerGroup();var station18 = new L.LayerGroup();
      var station19 = new L.LayerGroup();var station20 = new L.LayerGroup();
      var station21 = new L.LayerGroup();var station22 = new L.LayerGroup();
      var station23 = new L.LayerGroup();var station24 = new L.LayerGroup();
      var station25 = new L.LayerGroup();var station26 = new L.LayerGroup();
      var station27 = new L.LayerGroup();var station28 = new L.LayerGroup();
      var station29 = new L.LayerGroup();var station30 = new L.LayerGroup();
      var station31 = new L.LayerGroup();var station32 = new L.LayerGroup();
      var station33 = new L.LayerGroup();var station34 = new L.LayerGroup();
      var station35 = new L.LayerGroup();var station36 = new L.LayerGroup();

      var station37 = new L.LayerGroup();var station38 = new L.LayerGroup();
      var station39 = new L.LayerGroup();var station40 = new L.LayerGroup();
      var station41 = new L.LayerGroup();var station42 = new L.LayerGroup();
      var station43 = new L.LayerGroup();var station44 = new L.LayerGroup();
      var station45 = new L.LayerGroup();var station46 = new L.LayerGroup();
      var station47 = new L.LayerGroup();var station48 = new L.LayerGroup();
      var station49 = new L.LayerGroup();var station50 = new L.LayerGroup();
      var station51 = new L.LayerGroup();var station52 = new L.LayerGroup();
      var station53 = new L.LayerGroup();var station54 = new L.LayerGroup();
      var station55 = new L.LayerGroup();var station56 = new L.LayerGroup();
      var station57 = new L.LayerGroup();var station58 = new L.LayerGroup();
      var station59 = new L.LayerGroup();var station60 = new L.LayerGroup();
      var station61 = new L.LayerGroup();var station62 = new L.LayerGroup();
      var station63 = new L.LayerGroup();var station64 = new L.LayerGroup();
      var station65 = new L.LayerGroup();var station66 = new L.LayerGroup();
      var station67 = new L.LayerGroup();var station68 = new L.LayerGroup();
      var station69 = new L.LayerGroup();var station70 = new L.LayerGroup();
      var station71 = new L.LayerGroup();var station72 = new L.LayerGroup();


      
      var rid = new L.LayerGroup();
      var ridNo = new L.LayerGroup();
      var dwr = new L.LayerGroup();
      var loyal = new L.LayerGroup();
      var borders= new L.LayerGroup();
      var x = 19.65755 ;
      var y = 99.8995964;
      var mbAttr = 'CRFlood ',
          mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
          osm = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
              maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });
          osmBw = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });
   

      var runLayer = omnivore.kml('{{ asset('kml/CR_18Amphoe_bound.kml') }}')
      .on('ready', function() {
          this.setStyle({
                    fillOpacity: 0,
            color: "#466DF3",
            weight: 3
        });
    }).addTo(borders); 
     
      var pin = L.icon({
          iconUrl: '{{ asset('images/icon/pin19.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin19.png') }}',
          iconSize: [30, 40],
          iconAnchor: [25, 40],
          popupAnchor: [0, 0]
        });

      var pinMO = L.icon({
          iconUrl: '{{ asset('images/icon/pin19.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin19.png') }}',
          iconSize: [25, 34],
          iconAnchor: [5, 30],
          popupAnchor: [0, 0]
        });
      var pin_N= L.icon({
          iconUrl: '{{ asset('images/icon/pin16.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin16.png') }}',
          iconSize: [30, 40],
          iconAnchor: [20, 40],
          popupAnchor: [0, 0]
        });

      var pinMO_N = L.icon({
          iconUrl: '{{ asset('images/icon/pin16.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin16.png') }}',
          iconSize: [18, 20],
          iconAnchor: [10, 10],
          popupAnchor: [0, 0]
        });
      var pin_Y = L.icon({
          iconUrl: '{{ asset('images/icon/pin17.png')}}',
          iconRetinaUrl:'{{ asset('images/icon/pin17.png')}}',
          iconSize: [30, 40],
          iconAnchor: [20, 40],
          popupAnchor: [0, 0]
        });

      var pinMO_O  = L.icon({
          iconUrl: '{{ asset('images/icon/pin20.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin20.png') }}',
          iconSize: [8, 8],
          iconAnchor: [10, 10],
          popupAnchor: [0, 0]
        });
        var pin_O = L.icon({
          iconUrl: '{{ asset('images/icon/pin20.png')}}',
          iconRetinaUrl:'{{ asset('images/icon/pin20.png')}}',
          iconSize: [30, 40],
          iconAnchor: [20, 40],
          popupAnchor: [0, 0]
        });

      var pinMO_Y  = L.icon({
          iconUrl: '{{ asset('images/icon/pin17.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin17.png') }}',
          iconSize: [8, 8],
          iconAnchor: [10, 10],
          popupAnchor: [0, 0]
        });
      var pin_R = L.icon({
          iconUrl: '{{ asset('images/icon/pin18.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin18.png') }}',
          iconSize: [30, 40],
          iconAnchor: [20, 40],
          popupAnchor: [0, 0]
        });

      var pinMO_R = L.icon({
          iconUrl: '{{ asset('images/icon/pin18.png') }}',
          iconRetinaUrl:'{{ asset('images/icon/pin18.png') }}',
          iconSize: [18, 20],
          iconAnchor: [10, 10],
          popupAnchor: [0, 0]
        });


      // var amp=["ขุนตาล","พญาเม็งราย","เทิง","พาน","เมืองเชียงราย","ป่าแดด","แม่ลาว","แม่สรวย","เวียงป่าเป้า"];
      // var amp=["ขุนตาล","พญาเม็งราย","เทิง","พาน","เมืองเชียงราย","แม่ลาว","แม่สรวย","เวียงป่าเป้า","ป่าแดด"];
      var amp=["ขุนตาล", "เชียงของ", "เชียงแสน","ดอยหลวง","เทิง","ป่าแดด", "พญาเม็งราย","พาน", "เมืองเชียงราย", "แม่จัน","แม่ฟ้าหลวง","แม่ลาว","แม่สรวย", "แม่สาย","เวียงแก่น","เวียงเชียงรุ้ง","เวียงชัย","เวียงป่าเป้า"] 
      
      
      function addPin(ampName,i,c,mo){
          $.getJSON("{{ asset('score') }}/"+amp[i]+"/"+c, 
          function (data){
            // alert (ampName);
            for (i=0;i<data.length;i++){
              // var lo =data[i].geometry.coordinates+ '';;
              var x=data[i].lat;
              var y=data[i].long;
              // alert (x);
              var text ="<font style=\"font-family: 'Mitr';\" size=\"3\"COLOR=#1AA90A > รหัส :" + data[i].weir_code + "</font><br>";
                  text1 ="<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 > ฝาย : "+ data[i].weir_name+ " (ลำน้ำ : "+ data[i].river+")</font><br>";
                  text2 ="<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 >ที่ตั้ง : "+ data[i].weir_village +" ต."+ data[i].weir_tumbol +" อ."+ data[i].weir_district +"</font><br>";
                  text3 ="<br><table align=\"center\"><tr><td >" + "<a href='{{ asset('report/pdf') }}/"+data[i].weir_code+"' target=\"_blank\"><button class=\"btn btn-primary btn-sm waves-effect waves-light\"><i class=\"feather icon-sidebar\"></i> รายงาน</button> </a></td> <td> <a href='{{ asset('/pdf') }}/"+data[i].weir_code+"' target=\"_blank\">  "+"<button class=\"btn btn-primary btn-sm waves-effect waves-light\"><i class=\"feather icon-eye\"></i> แบบสำรวจ</button> </a>" +"</td><td > <a href='{{ asset('/photo') }}/"+data[i].weir_code+"' target=\"_blank\">  " + "<button class=\"btn btn-primary btn-sm waves-effect waves-light\"><i class=\"feather icon-image\"></i> ภาพประกอบ</button> </a></td></tr></table>";
              if(c=="สภาพดี"){
                if(mo==0){
                    L.marker([x,y],{icon: pinMO_N}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }else{
                    L.marker([x,y],{icon: pin_N}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }
              }else if(c=="สภาพค่อนข้างดี"){
                if(mo==0){
                    L.marker([x,y],{icon: pinMO_Y}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }else{
                    L.marker([x,y],{icon: pin_Y}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }
              }else if(c=="สภาพปานกลาง"){
                if(mo==0){
                    L.marker([x,y],{icon: pinMO_O}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }else{
                    L.marker([x,y],{icon: pin_O}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }
              }else{
                if(mo==0){
                    L.marker([x,y],{icon: pinMO_R}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }else{
                    L.marker([x,y],{icon: pin_R}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }
              }

                
            }//end for
          });
        
        
      }

      
      var mx = window.matchMedia("(max-width: 700px)");
      if(mx.matches){
        mo=0;
        // alert(x.matches);
      }else{
        mo=1;
      }
        
        addPin(station1,0,"สภาพดี",mo);
        addPin(station2,1,"สภาพดี",mo);
        addPin(station3,2,"สภาพดี",mo);
        addPin(station4,3,"สภาพดี",mo);
        addPin(station5,4,"สภาพดี",mo);
        addPin(station6,5,"สภาพดี",mo);
        addPin(station7,6,"สภาพดี",mo);
        addPin(station8,7,"สภาพดี",mo);
        addPin(station9,8,"สภาพดี",mo);
        addPin(station10,9,"สภาพดี",mo);
        addPin(station11,10,"สภาพดี",mo);
        addPin(station12,11,"สภาพดี",mo);
        addPin(station13,12,"สภาพดี",mo);
        addPin(station14,13,"สภาพดี",mo);
        addPin(station15,14,"สภาพดี",mo);
        addPin(station16,15,"สภาพดี",mo);
        addPin(station17,16,"สภาพดี",mo);
        addPin(station18,17,"สภาพดี",mo);

        addPin(station19,0,"สภาพค่อนข้างดี",mo);
        addPin(station20,1,"สภาพค่อนข้างดี",mo);
        addPin(station21,2,"สภาพค่อนข้างดี",mo);
        addPin(station22,3,"สภาพค่อนข้างดี",mo);
        addPin(station23,4,"สภาพค่อนข้างดี",mo);
        addPin(station24,5,"สภาพค่อนข้างดี",mo);
        addPin(station25,6,"สภาพค่อนข้างดี",mo);
        addPin(station26,7,"สภาพค่อนข้างดี",mo);
        addPin(station27,8,"สภาพค่อนข้างดี",mo);
        addPin(station28,9,"สภาพค่อนข้างดี",mo);
        addPin(station29,10,"สภาพค่อนข้างดี",mo);
        addPin(station30,11,"สภาพค่อนข้างดี",mo);
        addPin(station31,12,"สภาพค่อนข้างดี",mo);
        addPin(station32,13,"สภาพค่อนข้างดี",mo);
        addPin(station33,14,"สภาพค่อนข้างดี",mo);
        addPin(station34,15,"สภาพค่อนข้างดี",mo);
        addPin(station35,16,"สภาพค่อนข้างดี",mo);
        addPin(station36,17,"สภาพค่อนข้างดี",mo);

        addPin(station37,0,"สภาพปานกลาง",mo);
        addPin(station38,1,"สภาพปานกลาง",mo);
        addPin(station39,2,"สภาพปานกลาง",mo);
        addPin(station40,3,"สภาพปานกลาง",mo);
        addPin(station41,4,"สภาพปานกลาง",mo);
        addPin(station42,5,"สภาพปานกลาง",mo);
        addPin(station43,6,"สภาพปานกลาง",mo);
        addPin(station44,7,"สภาพปานกลาง",mo);
        addPin(station45,8,"สภาพปานกลาง",mo);
        addPin(station46,9,"สภาพปานกลาง",mo);
        addPin(station47,10,"สภาพปานกลาง",mo);
        addPin(station48,11,"สภาพปานกลาง",mo);
        addPin(station49,12,"สภาพปานกลาง",mo);
        addPin(station50,13,"สภาพปานกลาง",mo);
        addPin(station51,14,"สภาพปานกลาง",mo);
        addPin(station52,15,"สภาพปานกลาง",mo);
        addPin(station53,16,"สภาพปานกลาง",mo);
        addPin(station54,17,"สภาพปานกลาง",mo);

        addPin(station55,0,"สภาพทรุดโทรม",mo);
        addPin(station56,1,"สภาพทรุดโทรม",mo);
        addPin(station57,2,"สภาพทรุดโทรม",mo);
        addPin(station58,3,"สภาพทรุดโทรม",mo);
        addPin(station59,4,"สภาพทรุดโทรม",mo);
        addPin(station60,5,"สภาพทรุดโทรม",mo);
        addPin(station61,6,"สภาพทรุดโทรม",mo);
        addPin(station62,7,"สภาพทรุดโทรม",mo);
        addPin(station63,8,"สภาพทรุดโทรม",mo);
        addPin(station64,9,"สภาพทรุดโทรม",mo);
        addPin(station65,10,"สภาพทรุดโทรม",mo);
        addPin(station66,11,"สภาพทรุดโทรม",mo);
        addPin(station67,12,"สภาพทรุดโทรม",mo);
        addPin(station68,13,"สภาพทรุดโทรม",mo);
        addPin(station69,14,"สภาพทรุดโทรม",mo);
        addPin(station70,15,"สภาพทรุดโทรม",mo);
        addPin(station71,16,"สภาพทรุดโทรม",mo);
        addPin(station72,17,"สภาพทรุดโทรม",mo);
      

      

      var baseTree = {
        label: 'BaseLayers',
        noShow: true,
        children: [  {label: ' แผนที่ภูมิประเทศ (Streets)', layer: osm},
                     {label: ' แผนที่ภาพถ่ายผ่านดาวเทียม (Satellite)', layer: osmBw},
        ]
      };
      var ctl = L.control.layers.tree(baseTree, null);
      

    
      var overlays = [
        {
          label: ' สภาพดี',
          selectAllCheckbox: true,
          children: [
                { label:" "+amp[0],layer: station1},
                { label:" "+amp[1],layer: station2},
                { label:" "+amp[2],layer: station3},
                { label:" "+amp[3],layer: station4},
                { label:" "+amp[4],layer: station5},
                { label:" "+amp[5],layer: station6},
                { label:" "+amp[6],layer: station7},
                { label:" "+amp[7],layer: station8},
                { label:" "+amp[8],layer: station9},
                { label:" "+amp[9],layer: station10},
                { label:" "+amp[10],layer: station11},
                { label:" "+amp[11],layer: station12},
                { label:" "+amp[12],layer: station13},
                { label:" "+amp[13],layer: station14},
                { label:" "+amp[14],layer: station15},
                { label:" "+amp[15],layer: station16},
                { label:" "+amp[16],layer: station17},
                { label:" "+amp[17],layer: station18},
          ]
        },
        {
            label: ' สภาพค่อนข้างดี',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: station19},
                { label:" "+amp[1],layer: station20},
                { label:" "+amp[2],layer: station21},
                { label:" "+amp[3],layer: station22},
                { label:" "+amp[4],layer: station23},
                { label:" "+amp[5],layer: station24},
                { label:" "+amp[6],layer: station25},
                { label:" "+amp[7],layer: station26},
                { label:" "+amp[8],layer: station27},
                { label:" "+amp[9],layer: station28},
                { label:" "+amp[10],layer: station29},
                { label:" "+amp[11],layer: station30},
                { label:" "+amp[12],layer: station31},
                { label:" "+amp[13],layer: station32},
                { label:" "+amp[14],layer: station33},
                { label:" "+amp[15],layer: station34},
                { label:" "+amp[16],layer: station35},
                { label:" "+amp[17],layer: station36},
          ]
        },
        {
            label: ' สภาพปานกลาง',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: station37},
                { label:" "+amp[1],layer: station38},
                { label:" "+amp[2],layer: station39},
                { label:" "+amp[3],layer: station40},
                { label:" "+amp[4],layer: station41},
                { label:" "+amp[5],layer: station42},
                { label:" "+amp[6],layer: station43},
                { label:" "+amp[7],layer: station44},
                { label:" "+amp[8],layer: station45},
                { label:" "+amp[9],layer: station46},
                { label:" "+amp[10],layer: station47},
                { label:" "+amp[11],layer: station48},
                { label:" "+amp[12],layer: station49},
                { label:" "+amp[13],layer: station50},
                { label:" "+amp[14],layer: station51},
                { label:" "+amp[15],layer: station52},
                { label:" "+amp[16],layer: station53},
                { label:" "+amp[17],layer: station54},
          ]
        },
        {
            label: ' สภาพทรุดโทรม',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: station55},
                { label:" "+amp[1],layer: station56},
                { label:" "+amp[2],layer: station57},
                { label:" "+amp[3],layer: station58},
                { label:" "+amp[4],layer: station59},
                { label:" "+amp[5],layer: station60},
                { label:" "+amp[6],layer: station61},
                { label:" "+amp[7],layer: station62},
                { label:" "+amp[8],layer: station63},
                { label:" "+amp[9],layer: station64},
                { label:" "+amp[10],layer: station65},
                { label:" "+amp[11],layer: station66},
                { label:" "+amp[12],layer: station67},
                { label:" "+amp[13],layer: station68},
                { label:" "+amp[14],layer: station69},
                { label:" "+amp[15],layer: station70},
                { label:" "+amp[16],layer: station71},
                { label:" "+amp[17],layer: station72},
          ]
        }
      ];
      
      var map = L.map('map', {
          layers: [osm,station1,station2,station3,station4,station5,station6,station7,station8,station9,station10,station11,station12,station13,station14,station15,station16,station17,station18,station19,station20,station21,station22,station23,station24,station25,station26,station27,station28,station29,station30,station31,station32,station33,station34,station35,station36,station37,
          station38,station39,station40,station41,station42,station43,station44,station45,station46,station47,station48,station49,station50,station51,station52,station53,station54,station55,station56,station57,station58,station59,station60,station61,station62,station63,station64,station65,station66,station67,station68,station69,station70,station71,station72,borders],
          center: [x,y],
          zoom: 9,
        });
      ctl.addTo(map).collapseTree().expandSelected();

      ctl.setOverlayTree(overlays).collapseTree(false).expandSelected(true);
      


      

    </script>

  
    <!-- End Map  -->
  </body>

</html>

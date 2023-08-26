<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <title>Mae Jang Basin </title>

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
                              <h3>แผนที่แสดงตำแหน่งฝายจำแนกตามสภาพฝาย ในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</h3>                              
                              
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
                                      <div class="sub-title"> <h4> ตารางสรุปผลจำนวนฝายจำแนกตามสภาพฝาย ในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง </h4> </div>
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
                                            <th valign="middle">ใช้งานได้</th>
                                            <th>ควรปรับปรุง</th>    
                                            <th>ควรรื้อถอนก่อสร้างใหม่ </th>                                                                             
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php for($i = 0;$i < count($result);$i++){  ?>
                                          <tr >
                                            <td width=25%>{{$result[$i]['amp']}}</td>
                                            <td width=20% align="center">{{$result[$i]['score_N']}}</td>
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

      var station19 = new L.LayerGroup();var station20 = new L.LayerGroup();
      var station21 = new L.LayerGroup();var station22 = new L.LayerGroup();

      var station37 = new L.LayerGroup();var station38 = new L.LayerGroup();
      var station39 = new L.LayerGroup();var station40 = new L.LayerGroup();

      var rid = new L.LayerGroup();
      var ridNo = new L.LayerGroup();
      var dwr = new L.LayerGroup();
      var loyal = new L.LayerGroup();
      var borders= new L.LayerGroup();

      var x = 18.230015 ; 
      var y = 99.656525;

      var mbAttr = 'Mae Jang Basin ',
          mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
          osm = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
              maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });
          osmBw = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });
   

      var runLayer = omnivore.kml('{{ asset('kml/bound_ขอบเขตลุ่มน้ำแม่จาง.kml') }}')
        .on('ready', function() {
            this.setStyle({
                      fillOpacity: 0,
              color: "#466DF3",
              weight: 3
          });
      }).addTo(borders); 
     
     
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


      var amp=["เมืองลำปาง","เกาะคา","แม่ทะ","แม่เมาะ"];
      
      
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
              if(c=="1"){
                if(mo==0){
                    L.marker([x,y],{icon: pinMO_N}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }else{
                    L.marker([x,y],{icon: pin_N}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                }
              }else if(c=="2"){
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
        
        addPin(station1,0,"1",mo);
        addPin(station2,1,"1",mo);
        addPin(station3,2,"1",mo);
        addPin(station4,3,"1",mo);

        addPin(station19,0,"2",mo);
        addPin(station20,1,"2",mo);
        addPin(station21,2,"2",mo);
        addPin(station22,3,"2",mo);

        addPin(station37,0,"3",mo);
        addPin(station38,1,"3",mo);
        addPin(station39,2,"3",mo);
        addPin(station40,3,"3",mo);
      

      

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
          label: ' ใช้งานได้',
          selectAllCheckbox: true,
          children: [
                { label:" "+amp[0],layer: station1},
                { label:" "+amp[1],layer: station2},
                { label:" "+amp[2],layer: station3},
                { label:" "+amp[3],layer: station4},
          ]
        },
        {
            label: ' ควรปรับปรุง',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: station19},
                { label:" "+amp[1],layer: station20},
                { label:" "+amp[2],layer: station21},
                { label:" "+amp[3],layer: station22},
          ]
        },
        {
            label: ' ควรรื้อถอนก่อสร้างใหม่',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: station37},
                { label:" "+amp[1],layer: station38},
                { label:" "+amp[2],layer: station39},
                { label:" "+amp[3],layer: station40},
          ]
        }
      ];
      
      var map = L.map('map', {
          layers: [osm,station1,station2,station3,station4,station19,station20,station21,station22,station37,station38,station39,station40,borders],
          center: [x,y],
          zoom: 10,
        });
      ctl.addTo(map).collapseTree().expandSelected();

      ctl.setOverlayTree(overlays).collapseTree(false).expandSelected(true);


      

    </script>

  
    <!-- End Map  -->
  </body>

</html>

<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <title>Mae Jang Basin </title>

    <link rel="icon" href="{{ asset('images/icon/favicon1.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/buttons.datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/responsive.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/form/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form/waves.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style1.css')}}">
    <style>
        td{
            font-size:18px;
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                        <h3>ข้อมูลสภาพปัญหาและแนวทางแก้ไขปัญหาเบื้องต้นของฝาย</h3>     
                                        <hr>                         
                                        </div>
                                        <div class="card-header">
                                            <div class="content">
                                                <div class="title m-b-md">
                                                    <form id="amp" name="amp" action="{{route('reportOne_amp.pdf')}}" enctype="multipart/form-data" method="POST" >
                                                        @csrf 
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-7 col-md-12">
                                                                    <div class="card text-white card-inverse">
                                                                        <div class="card-header">
                                                                                <h3> ข้อมูลสภาพปัญหาและแนวทางแก้ไขปัญหาเบื้องต้นของฝาย</h3>
                                                                        </div>
                                                                            <div class="card-body">
                                                                                <table class="table-name"  width=80% align=center style="margin-bottom:80px;margin-top:40px;">
                                                                                    <tr >
                                                                                    <td align="right" style="padding-right:40px;"> อำเภอ </td>
                                                                                        <td>
                                                                                            <select id='weir_district' name='amp' class="form-control" id="name">
                                                                                                <option value="sum">- - กรุณาเลือกอำเภอ - -</option>
                                                                                                <option value="ขุนตาล">ขุนตาล</option>
                                                                                                <option value="เชียงของ">เชียงของ</option>
                                                                                                <option value="เชียงแสน">เชียงแสน</option>
                                                                                                <option value="ดอยหลวง">ดอยหลวง</option>
                                                                                                <option value="เทิง">เทิง</option>
                                                                                                <option value="ป่าแดด">ป่าแดด</option>
                                                                                                <option value="พญาเม็งราย">พญาเม็งราย</option>
                                                                                                <option value="พาน">พาน</option>
                                                                                                <option value="เมืองเชียงราย">เมืองเชียงราย</option>
                                                                                                <option value="แม่จัน">แม่จัน</option>
                                                                                                <option value="แม่ฟ้าหลวง">แม่ฟ้าหลวง</option>
                                                                                                <option value="แม่ลาว">แม่ลาว</option>
                                                                                                <option value="แม่สรวย">แม่สรวย</option>
                                                                                                <option value="แม่สาย">แม่สาย</option>
                                                                                                <option value="เวียงแก่น">เวียงแก่น</option>
                                                                                                <option value="เวียงเชียงรุ่ง">เวียงเชียงรุ่ง</option>
                                                                                                <option value="เวียงชัย">เวียงชัย</option>
                                                                                                <option value="เวียงป่าเป้า">เวียงป่าเป้า</option>   
                                                                                            </select> 
                                                                                            <span class="messages"></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2" height="30px;"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding-right:40px;">ตำบล </td>
                                                                                        <td>
                                                                                            <select id="weir_tumbol" name="tumbol" class="form-control ">
                                                                                                <option value=''>-- เลือกตำบล --</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding-right:40px;">สถาพฝาย </td>
                                                                                        <td align="left"><br>
                                                                                            <div class="checkbox-zoom zoom-primary">
                                                                                                <label>
                                                                                                    <input type="checkbox" value="1" checked="" name="weir_N">
                                                                                                    <span class="cr">
                                                                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                                                    </span>
                                                                                                    <span>สภาพดี</span>
                                                                                                </label>
                                                                                            </div> <br> 
                                                                                            <div class="checkbox-zoom zoom-primary">
                                                                                                <label>
                                                                                                    <input type="checkbox" value="1" checked="" name="weir_Y">
                                                                                                    <span class="cr">
                                                                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                                                    </span>
                                                                                                    <span>สภาพค่อนข้างดี</span>
                                                                                                </label>
                                                                                            </div> <br> 
                                                                                            <div class="checkbox-zoom zoom-primary">
                                                                                                <label>
                                                                                                    <input type="checkbox" value="1" checked="" name="weir_O">
                                                                                                    <span class="cr">
                                                                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                                                    </span>
                                                                                                    <span>สภาพปานกลาง</span>
                                                                                                </label>
                                                                                            </div> <br> 
                                                                                            <div class="checkbox-zoom zoom-primary">
                                                                                                <label>
                                                                                                    <input type="checkbox" value="1" checked="" name="weir_D">
                                                                                                    <span class="cr">
                                                                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                                                    </span>
                                                                                                    <span>สภาพทรุดโทรม</span>
                                                                                                </label>
                                                                                            </div> 
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>  
                                                                            </div>
                                                                            <button type="submit" class="btn waves-effect waves-light btn-primary btn-block"  style="padding:10px;" formtarget="_blank"> PDF file</button>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    
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
    
    <script src="{{ asset('js/form/rocket-loader.min.js')}}"></script>
  
    <script src="{{ asset('js/form/jquery.datatables.min.js')}}" ></script>
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
    <script src= "{{ asset('js/chooselocationReport.js') }}"></script>
  
    <script src="{{ asset('js/form/rocket-loader.min.js')}}" data-cf-settings="ce2668daaac54a74e9f6cdff-|49" defer=""></script>

  
  </body>

</html>

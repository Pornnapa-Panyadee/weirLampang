<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <title>Weir CRflood </title>

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
    <link rel="stylesheet" href="{{ asset('css/form/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style1.css')}}">

    <style>
      .text{
        font-size: 18px;
        margin: 5px;
        margin-bottom: 20px;
        padding:10px;
        text-indent: 5em;
      }
      .text2{
        font-size: 18px;
        margin-left: 5em;
        padding:5px;
      }
      .text3{
        font-size: 18px;
        margin-left: 7em;
        padding:5px;
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
                            <div class="row justify-content-md-center">
                                <div class="col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header text-center">
                                        <h2>โครงการพัฒนาระบบสารสนเทศการตรวจประเมินสภาพฝายและวางแผน <br>ปรับปรุงเพิ่มประสิทธิภาพฝายในพื้นที่จังหวัดเชียงราย</h2>     
                                        <hr>                         
                                        </div>
                                        <div class="card-block">
                                          <div class="row justify-content-md-center">
                                            <div class="col-md-10 col-lg-10">
                                              <div class="card">
                                                 <div class="card-block">
                                                    <h3> 1. หลักการและเหตุผล : </h3>
                                                      <div class="text">สืบเนื่องจากปี พ.ศ. 2562 จังหวัดเชียงรายได้ดำเนินการโครงการบริหารจัดการทรัพยากรน้ำแบบบูรณาการ กิจกรรมพัฒนาระบบสารสนเทศเตรียมความพร้อมเพื่อรับมือภัยน้ำท่วมและดินถล่มจังหวัดเชียงราย โดยมีกิจกรรมสำคัญเป็นการพัฒนาระบบข้อมูลของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนน และวิธีการแก้ไขปัญหาการกีดขวางทางน้ำแต่ละแห่งในพื้นที่ของจังหวัดเชียงราย โดยใช้ความรู้ด้านวิชาการร่วมกับองค์ความรู้ของชุมชนในฐานะเจ้าของพื้นที่ในการวางแผนแก้ปัญหาการกีดขวางทางน้ำอย่างเป็นระบบ มีการเก็บข้อมูลปัญหาการกีดขวางทางน้ำ 
                                                        การถูกบุกรุกของลำน้ำคูคลอง และถนนขวางทางน้ำจนทำให้ลำน้ำขาดประสิทธิภาพการระบายน้ำเกิดปัญหาน้ำท่วม ซึ่งจากการลงพื้นที่เพื่อเก็บข้อมูลสิ่งกีดขวางทางน้ำครอบคลุมทุกตำบลแล้วนั้น ได้พบปัญหาสำคัญมากอีกอย่าง คือ ฝายและระบบส่งน้ำที่มีอยู่จำนวนมากนั้น มีฝายบางส่วนที่สร้างปัญหากีดขวางทางน้ำทำให้เกิดน้ำท่วมในพื้นที่ แต่ยังมีฝายอีกจำนวนมากที่ชำรุดเสียหายหรือมีประสิทธิภาพไม่ดี ได้แก่ การขาดความสามารถในการยกระดับผันน้ำเข้าคลองหรือเหมืองส่งน้ำไปใช้ในฤดูการเพาะปลูก มีตะกอนหน้าฝาย 
                                                        และขาดความสามารถใช้เก็กกักน้ำไว้ใช้ที่บริเวณหน้าฝายในฤดูแล้ง ซึ่งถ้าแก้ไขปรับปรุงไม่ถูกหลักวิชาการจะก่อให้เกิดปัญหากีดขวางทางน้ำขึ้นได้ ซึ่งปัญหาเหล่านี้จะเพิ่มและรุนแรงมากขึ้น ในแต่ละปีทางภาครัฐต้องใช้งบประมาณจำนวนมากในการบรรเทาปัญหาน้ำท่วมและภัยแล้งจากการขาดประสิทธิภาพของฝาย ซึ่งเป็นการแก้ไขปัญหาเฉพาะหน้าไม่มีความยั่งยืน และจากการหารือในคณะอนุกรรมทรัพยากรน้ำจังหวัดเชียงราย พบว่าจังหวัดเชียงรายยังขาดการจัดเก็บระบบฐานข้อมูลสภาพของฝายของทุกหน่วยงานที่มีหลายร้อยแห่ง 
                                                        ทำให้การวางแผนป้องกันและแก้ไขปัญหาภัยแล้งในพื้นที่เกษตรที่ใช้น้ำจากฝายยังทำได้ไม่ดี เนื่องจากฝายจำนวนมากมีการชำรุด หลายหน่วยงานไม่สามารถซ่อมแซมได้เนื่องจากต้องใช้ความรู้ในวิชาการด้านวิศวกรรมชลศาสตร์ และไม่มีการจัดเก็บในรูปแบบเดียวกัน ขาดผลการตรวจสภาพฝายและไม่มีการเตรียมแนวทางการซ่อมแซมแก้ไขการชำรุดของฝายไว้ล่วงหน้า ทำให้เสียโอกาสในการได้ใช้งบประมาณจากภาครัฐในเรื่องการแก้ไขปัญหาภัยแล้งเร่งด่วน ทั้งที่การใช้งบในการปรับปรุงซ่อมแซมฝายที่มีอยู่เดิมนั้น สามารถทำได้โดยทันที 
                                                        เพราะไม่มีปัญหาเรื่องการใช้ที่ดินใหม่ และไม่มีปัญหาข้อขัดแย้งของชุมชน 
                                                      </div>
                                                      <div class="text"> การแก้ไขปัญหาดังกล่าวให้ได้ผลนั้น จะต้องทำการตรวจสอบสภาพฝายและระบบส่งน้ำซึ่งเป็นการตรวจสภาพการใช้งานและความเสี่ยงต่อความปลอดภัยขององค์ประกอบต่าง ๆของฝาย และใช้องค์ความรู้ด้านวิชาการร่วมกับองค์ความรู้ของชุมชน มาวางแนวทางปรับปรุงหรือเปลี่ยนแปลงรูปแบบของฝาย เพื่อให้กลับมามีประสิทธิภาพทำหน้าที่ได้และขณะเดียวกันต้องไม่ทำให้เกิดปัญหากีดขวางทางน้ำ นอกจากนี้น้ำที่เก็บกักหน้าฝายจะเป็นแหล่งเติมน้ำให้กับชั้นน้ำใต้ดินระดับตื้นในพื้นที่ได้เป็นอย่างดี 
                                                        จึงจำเป็นต้องทำโครงการเพื่อพัฒนาระบบข้อมูลสารสนเทศการตรวจสอบและวางแผนปรับปรุงเพิ่มประสิทธิภาพฝายในพื้นที่จังหวัดเชียงราย เพื่อเป็นแนวทางการแก้ไขปัญหาที่เหมาะสมถูกหลักวิชาการ มีการรวบรวมตำแหน่งของฝายทุกแห่งที่มีปัญหา และแนวทางวิธีการปรับปรุงเพิ่มประสิทธิภาพหรือปรับเปลี่ยนรูปแบบในแต่ละแห่ง โดยเฉพาะอย่างยิ่งฝายที่มีอยู่จำนวนมากที่ก่อสร้างและอยู่ในการดูแลขององค์กรปกครองส่วนท้องถิ่นและชุมชน เพื่อเตรียมความพร้อมรับมือสถานการณ์ภัยแล้งและน้ำท่วม โดยผลผลิตที่ได้จะใช้เป็นข้อมูลสำคัญในกำหนดรูปแบบของการวางแผน 
                                                        การจัดหางบประมาณ และลงมือปฏิบัติการแก้ไขปัญหาต่อไปโดยหน่วยงานที่เกี่ยวข้อง องค์กรปกครองส่วนท้องถิ่น และชุมชน 
                                                      </div>

                                                    <br>
                                                    <h3>2. วัตถุประสงค์ของโครงการ : </h3>
                                                    <div class="text"> พัฒนาระบบสารสนเทศการตรวจสอบและวางแผนปรับปรุงเพิ่มประสิทธิภาพฝายในพื้นที่ 18 อำเภอของจังหวัดเชียงราย เพื่อเตรียมความพร้อมรับมือสถานการณ์น้ำท่วมและภัยแล้ง นอกจากนี้น้ำที่เก็บกักหน้าฝายจะเป็นแหล่งเติมน้ำให้กับชั้นน้ำใต้ดินในพื้นที่ได้เป็นอย่างดี โดยใช้ความรู้ในทางวิชาการร่วมกับองค์ความรู้ของชุมชน </div>
                                                    
                                                    <br>
                                                    <h3>3. กลุ่มเป้าหมาย และผู้มีส่วนได้ส่วนเสีย : </h3>
                                                    <div class="text2"> 3.1 กลุ่มเป้าหมาย :  </div>
                                                    <div class="text3"> 1. หน่วยงานราชการ หน่วยงานปกครองส่วนท้องถิ่น และชุมชน สามารถนำข้อมูลมาวางแผนการบริหารจัดการ เพื่อการวางแผนแก้ไขปัญหาการขาดศักยภาพของฝายในพื้นที่ได้โดยใช้รูปแบบการวางแผนแก้ไขปัญหาในพื้นที่ต้นแบบเป็นตัวอย่างได้  <br>
                                                     2. จังหวัดเชียงราย สามารถใช้เพื่อกำหนดนโยบาย และติดตามงานด้านบริหารจัดการน้ำ การจัดการภัยแล้งและน้ำท่วมในพื้นที่ </div>
                                                   
                                                    <div class="text2">  3.2 ผู้มีส่วนได้ส่วนเสีย : จังหวัดเชียงราย กรมป้องกันและบรรเทาสาธารณภัย กรมชลประทาน กรม ทรัพยากรน้ำ ทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด กรมเจ้าท่า องค์กรปกครองส่วนท้องถิ่น มูลนิธิ องค์กรสาธารณกุศล อาสาสมัคร และประชาชน</div>
                                                    
                                                    <br>
                                                    <h3>4. เป้าหมาย ผลผลิต และผลลัพธ์ : </h3>
                                                    <div class="text2"> 4.1 เป้าหมายโครงการ :</div>
                                                    <div class="text3" style="overflow-x:auto;" width="50%">
                                                      <table border="1" width="60%" >
                                                        <tr align="center">
                                                          <th>ตัวชี้วัด</th>
                                                          <th>หน่วยนับ</th>
                                                          <th>ปี 2564</th>
                                                        </tr>
                                                        <tr>
                                                          <td width="60%" class="text2">จังหวัดเชียงรายมีระบบสารสนเทศการตรวจสอบและ<br>วางแผนปรับปรุงเพิ่มประสิทธิภาพฝายพร้อมแนวทาง<br>และวิธีการแก้ไขปัญหาเพื่อเตรียมความพร้อมรับมือ<br>น้ำท่วมและภัยแล้ง ในพื้นที่จังหวัดเชียงราย <br>จำนวน 18 อำเภอ</td>
                                                          <td width="20%" align="center">ระบบ </td>
                                                          <td align="center"> 1</td>
                                                        </tr>
                                                      </table>
                                                    </div>
                                                    <div class="text2"> 4.2 ผลผลิต : </div> 
                                                    <div class="text3">1. พื้นที่จังหวัดเชียงราย จำนวน 18 อำเภอ มีระบบการตรวจสอบและวางแผนปรับปรุงเพิ่มประสิทธิภาพฝายพร้อมแนวทางและวิธีการแก้ไขปัญหา เพื่อเตรียมความพร้อมรับมือน้ำท่วมและภัยแล้ง นอกจากนี้น้ำที่เก็บกักหน้าฝายจะเป็นแหล่งเติมน้ำให้กับชั้นน้ำใต้ดินในพื้นที่ได้ <br>
                                                    2. มีฐานข้อมูลและแนวคิดสำหรับวิธีการแก้ไขปัญหาเพื่อปรับปรุงฝาย เพื่อให้หน่วยงานที่เกี่ยวข้องนำไปใช้วางแผนและออกแบบรายละเอียดในการแก้ปัญหาที่เหมาะสมได้ </div>
                                                    <div class="text2"> 4.3 ผลลัพธ์ : </div> 
                                                    <div class="text3">ฝายในทุกตำบลของ 18 อำเภอ ในพื้นที่จังหวัดเชียงราย ได้รับการปรับปรุงเพื่อเพิ่มประสิทธิภาพให้สามารถยกระดับผันน้ำเข้าคลองหรือเหมืองส่งน้ำไปใช้ในฤดูการเพาะปลูก และสามารถเก็บกักน้ำไว้ใช้ในฤดูแล้ง เพื่อบรรเทาปัญหาน้ำท่วมและภัยแล้ง นอกจากนี้น้ำที่เก็บกักหน้าฝายจะเป็นแหล่งเติมน้ำให้กับชั้นน้ำใต้ดินในพื้นที่ได้เป็นอย่างดี  </div>
                                                    
                                                    <br>
                                                    <h3>5. ระบบสารสนเทศการตรวจประเมินสภาพฝายและวางแผนปรับปรุงเพิ่มประสิทธิภาพฝายในพื้นที่จังหวัดเชียงราย : </h3>
                                                      <div align="center">
                                                          <img src="{{ asset('images/icon/qr.png') }}" width="20%"> <br>
                                                          เว็บไซต์ : <a href="https://watercenter.scmc.cmu.ac.th/weir/jang_basin/"> www.watercenter.scmc.cmu.ac.th/weir/jang_basin/ </a> <br>
                                                          ดาวน์โหลด : <a href="{{ asset('images/icon/qr.png') }}" download> QRcode  </a>
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

  
    <script src="{{ asset('js/form/rocket-loader.min.js')}}" data-cf-settings="ce2668daaac54a74e9f6cdff-|49" defer=""></script>

  
  </body>

</html>

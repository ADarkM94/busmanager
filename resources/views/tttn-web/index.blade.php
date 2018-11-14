@extends('tttn-web.main')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="main">
     <div class="mainleft">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height: 400px;">

      <div class="item active">
        <img src="images/4.jpg" alt="Los Angeles" style="width:100%; height: 400px;">
        
      </div>

      <div class="item">
        <img src="images/1.jpg" alt="Chicago" style="width:100%; height: 400px;">

      </div>
    
      <div class="item">
        <img src="images/5.jpg" alt="New York" style="width:100%; height: 400px;">
        
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

            <!-- <div class="slideshow-container">
            
                <div class="mySlides fade1">
                    <div class="numbertext">1 / 3</div>
                    <a href="#"><img src="images/4.jpg" style="height:400px; width: 100%;"></a>
                    <div class="text">Địa điểm 1</div>
                </div>
            
                <div class="mySlides fade1">
                    <div class="numbertext">2 / 3</div>
                    <a href="#"><img src="images/1.jpg" style="height:400px;width: 100%;"></a>
                    <div class="text">Địa điểm 2</div>
                </div>
            
                <div class="mySlides fade1">
                    <div class="numbertext">3 / 3</div>
                    <a href="#"><img src="images/5.jpg" style="height:400px;width: 100%;"></a>
                    <div class="text">Địa điểm 3</div>
                </div>
            
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div> -->
        </div>
        <div class="mainright">
            <div class="timchuyendi"><h4>ĐẶT VÉ TRỰC TUYẾN</h4></div>
            <form name="timve" action="{{route('chuyenxe')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="diadiem">
                <label>Chọn Nơi Khởi Hành: </label>
                <div class="input-group" style="box-shadow: 0 3px #F3AD45;">
                     <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                     <select name="Noidi">
                      @foreach($tinh as $t)
                      <option>{{$t->Tên}}</option>
                       @endforeach
                    </select>    
                </div>
            </div>
            <div class="diadiem">
                <label>Chọn Nơi Đến </label>
                <div class="input-group" style="box-shadow: 0 3px #F3AD45;">
                     <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                      <select name="Noiden">
                        @foreach($tinh as $t)
                        <option>{{$t->Tên}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="ngaydi">
                <label>Chọn ngày đi: </label>
                    <div class="form-group" style="box-shadow: 0 3px #F3AD45;">
                        <div class='input-group date'>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar" style="color: #f57812;"></span>
                            </span>
                            <input type='date' class="form-control" name="Ngaydi" id="txtdate" style="padding-left: 0" />
                        </div>
                     </div>
                <div class="tim">
                    <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                    <button type="button" class="btn" onclick="document.forms['timve'].submit();"><a href="javascript:void(0)" >Tìm vé</a></button>
                </div>
            </div>
        </div>
    </form>
        
        <div style="clear: left;"></div>
        <div class="tintuc">
            <div class="tentintuc"><h3>Tin Tức Nổi Bật</h3></div>
            <ul>
                <li>
                    
                    <img src="images/12.jpg">
                    
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
                <li>
                       
                    <img src="images/12.jpg">
                   
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
                <li>
                     
                    <img src="images/12.jpg">
                   
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
            </ul>
            <div class="tintucbutton">
                <button class="btn"><a href="tintuc.html">Xem Toàn Bộ</a></button>
            </div>
        </div>
        <div style="clear: left;"></div>
        <div class="dichvu">
            <h4>" Hãy đến với chúng tôi "</h4>
            <h2>Để Nhận Dịch Vụ Tốt Nhất !</h2>
           <div class="dv">
               <img  src="images/free_wifi.png" />
               <br>
               <strong>Wifi Miễn Phí Mọi Nơi !</strong>
           </div>
           <div class="dv">
               <img  src="images/dien.png" />
               <br>
               <strong>Ổ Cắm Theo Từng Chổ Ngồi !</strong>
           </div>
           <div class="dv">
               <img  src="images/chongoi.png" />
               <br>
               <strong>Chổ Ngồi/Nằm Thỏa mái !</strong>
           </div>
        </div>
        
    </div>
@endsection
@section('script')
   <!--  <script type="text/javascript" src="{{asset('js/js.js')}}"></script> -->
    <script type="text/javascript">
        function chonngay(){
            var d = new Date();
            var ngay = d.getDate()<10? ('0'+d.getDate()):d.getDate();
            var thang = (d.getMonth() + 1) <10? ('0'+d.getMonth()+1):d.getMonth()+1;
            var nam = d.getFullYear();
            document.getElementById("txtdate").min=nam+"-"+thang+"-"+ngay;
            document.getElementById("txtdate").value= nam+"-"+thang+"-"+ngay;
        }
        chonngay();
    </script>
@endsection

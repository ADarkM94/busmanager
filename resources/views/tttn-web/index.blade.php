@extends('tttn-web.main')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="main">
        <div class="left">
            <div class="slideshow-container">

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
            </div>
        </div>
        <div class="right">
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
                            <input type='date' class="form-control" name="Ngaydi" id="txtdate" />
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
            <div class="tentintuc"><h2>Tin Tức Nổi Bật</h2></div>
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
                <button><a href="tintuc.html">Xem Toàn Bộ</a></button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/js.js')}}"></script>
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

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
                    <a href="#"><img src="{{asset('images/4.jpg')}}" style="height:400px; width: 100%;"></a>
                    <div class="text">Địa điểm 1</div>
                </div>

                <div class="mySlides fade1">
                    <div class="numbertext">2 / 3</div>
                    <a href="#"><img src="{{asset('images/1.jpg')}}" style="height:400px;width: 100%;"></a>
                    <div class="text">Địa điểm 2</div>
                </div>

                <div class="mySlides fade1">
                    <div class="numbertext">3 / 3</div>
                    <a href="#"><img src="{{asset('images/5.jpg')}}" style="height:400px;width: 100%;"></a>
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
                <label>Chọn Nơi Khởi Hành </label>
                <div class="the">
                    <i class="fa fa-bus"></i>
                     <select name="Noidi">
                        @foreach($tinh as $t)
                        <option>{{$t->Tên}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="diadiem">
                <label>Chọn Nơi Đến </label>
                <div class="the">
                    <i class="fa fa-bus"></i>
                     <select name="Noiden">
                        @foreach($tinh as $t)
                        <option>{{$t->Tên}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="ngaydi">
                <label>Chọn ngày đi: </label>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> <input class="form-control" readonly="" type="text" name="Ngaydi"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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
                    <img src="{{asset('images/12.jpg')}}">
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
                <li>
                    <img src="{{asset('images/12.jpg')}}">
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
                <li>
                    <img src="{{asset('images/12.jpg')}}">
                    <a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
                </li>
            </ul>
            <div class="tintucbutton">
                <button><a href="tintuc.html">Xem Toàn Bộ</a></button>
            </div>
        </div>
    </div>
@endsection


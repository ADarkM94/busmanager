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
                    <a href="#"><img src="images/1.jpg" style="height:400px; width: 100%;"></a>
                    <div class="text">Địa điểm 1</div>
                </div>

                <div class="mySlides fade1">
                    <div class="numbertext">2 / 3</div>
                    <a href="#"><img src="images/2.jpg" style="height:400px;width: 100%;"></a>
                    <div class="text">Địa điểm 2</div>
                </div>

                <div class="mySlides fade1">
                    <div class="numbertext">3 / 3</div>
                    <a href="#"><img src="images/3.jpg" style="height:400px;width: 100%;"></a>
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
            <div class="diadiem">
                <label>Chọn Nơi Khởi Hành </label>
                <div class="the">
                    <i class="fa fa-bus"></i>
                    <select>
                        <option>Quảng Ngãi</option>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Bình Định</option>
                    </select>
                </div>
            </div>
            <div class="diadiem">
                <label>Chọn Nơi Đến </label>
                <div class="the">
                    <i class="fa fa-bus"></i>
                    <select>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Quảng Ngãi</option>
                        <option>Bình Định</option>
                    </select>
                </div>
            </div>
            <div class="ngaydi">
                <label>Chọn ngày đi: </label>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> <input class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
                <div class="tim">
                    <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                    <button type="button" class="btn"><a href="chuyenxe.html">Tìm vé</a></button>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
@endsection

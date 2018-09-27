@extends('tttn-web.main')
@section('title')
    Liên hệ
@endsection
@section('content')
    <div class="container-fluid">
        <div id="main">
            <div id="left">
                <h2>Thông Tin Liên Hệ</h2>
                <div id="text">
                    <p><ins>Head office:</ins>Đại Học Bách Khoa Hồ Chí Minh</p>
                    <p>Phone: <span>0989671651</span></p>
                    <p>Fax: <span>(Không có)</span></p>
                    <p>Email: <a href="#">nhan51202526@gmail.com</a></p>
                    <ul>
                        <li><img src="images/lienhe/icon1.png"></li>
                        <li><img src="images/lienhe/icon2.png"></li>
                        <li><img src="images/lienhe/icon3.png"></li>
                        <li><img src="images/lienhe/icon4.png"></li>
                        <li><img src="images/lienhe/icon5.png"></li>
                        <li><img src="images/lienhe/icon6.png"></li>
                        <li><img src="images/lienhe/icon7.png"></li>
                    </ul>
                </div>
            </div>
            <div id="right">
                <div id="form-lienhe">
                    <h1>Liên hệ</h1>
                    <table>
                        <tr>
                            <td><p>Họ tên<p></td>
                            <td><p>Tiêu đề</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="txtname"></td>
                            <td><input type="text" name="txttieude"></td>
                        </tr>
                        <tr>
                            <td><p>Địa chỉ Email</p></td>
                            <td><p>Nội dung</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="txtname"></td>
                            <td rowspan="3"><textarea rows="4.5"></textarea></td>
                        </tr>
                        <tr>
                            <td><p>Điện thoại</p></td>

                        </tr>
                        <tr>
                            <td><input type="text" name="txtname"></td>

                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger">GỬI</button>
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15677.98094730002!2d106.65066606977537!3d10.773330600000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJBIUUctVFAuSENN!5e0!3m2!1svi!2s!4v1536860519114" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

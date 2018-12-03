@extends('tttn-web.main')
@section('title')
    Liên hệ
@endsection
@section('content')
    <div class="container-fluid">
        <div id="main">
            <div id="left">
                <!-- Thông tin liên hệ -->
                    <h2>Thông Tin Liên Hệ</h2>
                    <div id="text">
                        <p><ins>Head office:</ins>Đại Học Bách Khoa Hồ Chí Minh</p>
                        <p>Phone: <span>0989671651</span></p>
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
                <!-- Kết thúc phần thông tin liên hệ -->
            </div>
            <div id="right">
                <!-- form liên hệ -->
                <div id="form-lienhe">
                    <h1>Liên hệ</h1>
                    <table>
                        <tr>
                            <td><p>Họ tên<p></td>
                            <td><p>Tiêu đề</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="txtname"></td>
                            <td><input type="text" class="txttieude"></td>
                        </tr>
                        <tr>
                            <td><p>Địa chỉ Email</p></td>
                            <td><p>Nội dung</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="txtmail"></td>
                            <td rowspan="3"><textarea rows="4.5" class="txtnoidung"></textarea></td>
                        </tr>
                        <tr>
                            <td><p>Điện thoại</p></td>

                        </tr>
                        <tr>
                            <td><input type="text" class="txtphone"></td>

                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger guilienhe">GỬI</button>
                    <!-- Map -->
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15677.98094730002!2d106.65066606977537!3d10.773330600000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJBIUUctVFAuSENN!5e0!3m2!1svi!2s!4v1536860519114" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         $(document).ready(function(){
            /*Xử lý liên hệ*/
            $(".guilienhe").click(function(){
                var ten = $(".txtname").val();
                var mail = $(".txtmail").val();
                var dt = $(".txtphone").val();
                var tieude = $(".txttieude").val();
                var noidung = $(".txtnoidung").val();
                var bieuthucten = /[a-zA-Z][^#&<>\"~;$^%{}?]{1,50}$/;
                var bieuthucmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}$/;
                var bieuthucphone = /^(0[3578]|09)[0-9]{8}$/;
                var kt = true;
                /*Kiểm tra tên*/
                if(ten.search(bieuthucten)==-1){
                     kt = false;
                 }
                /*kiểm tra mail*/
                if(mail.search(bieuthucmail)==-1){
                     kt = false;
                 }
                /*kiểm tra số điện thoại*/
                if(dt.search(bieuthucphone)==-1){    
                         kt = false;
                    }
                /*kiểm tra tiêu đề*/
                if(tieude == ""){
                    kt = false;
                }
                /*kiểm tra nội dung*/
                 if(noidung == ""){
                    kt = false;
                }
                if(kt == true){
                        $.ajax({
                            url: '{{route("xulylienhe")}}',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                TEN: ten,
                                MAIL: mail,
                                DT: dt,
                                TIEUDE: tieude,
                                NOIDUNG: noidung
                            },
                            success: function (data) {
                               if(data.kq==1){
                                    alert("Đã lưu liên hệ của bạn, chờ admin diệt !");
                                    location.reload();
                               }
                            }
                     });
                }
                else {
                    alert("Thông tin bạn nhập không chính xác, vui lòng kiểm tra lại !");
                }
            });
        });
    </script>
@endsection

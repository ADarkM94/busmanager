@extends('tttn-web.main')
@section('title')
    Liên hệ
@endsection
@section('content')
    <div class="doithongtin">
        <div class="popup">
            <div class="tabledoithongtin">
                <div class="tendoithongtin">
                    <h3>Đổi Thông Tin</h3>
                </div>
                <div class="hienloi">
                <div class="dnloi"></div>
                <div class="dnloi2"></div>
            </div>
                
                    <table>
                        <tr>
                            <td>Tên</td>
                            <td><input type="text" size="25" class="dttname"></td>
                        </tr>
                        <tr>
                            <td>Ngày Sinh</td>
                           <td>
                               <input type="date" class="dttngaysinh">
                           </td>
                        </tr>
                        <tr>
                            <td>Giới Tính</td>
                            <td>
                                <input type="radio" name="txtgioitinh" value="1" checked>Nam
                                <input type="radio" name="txtgioitinh" value="0">Nữ
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><textarea cols="27" rows="3"  class="dttdiachi"></textarea></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text"  size="25" class="dttemail"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="capnhat" style="margin-right: 10px;width: 70px;background: #f57812;color: #FFF; border: none;height: 30px;">Cập nhật</button><button class="colsedoithongtin" style="margin-right: 10px;width: 70px;background: #f57812;color: #FFF; border: none;height: 30px;">Thoát</button></td>
                        </tr>
                    </table>
               
            </div>
        </div>
    </div>
    <div class="doimatkhau">
        <div class="popupdoimatkhau">
            <div class="tabledoimatkhau">
                <div class="tendoimatkhau">
                    <h3>Đổi Mật Khẩu</h3>
                </div>
                <div class="hienloi">
                <div class="dmkloi"></div>
                <div class="dmkloi2"></div>
                <div class="dmkloi3"></div>
                <div class="dmkloi4"></div>
                <div class="thanhcong"></div>
            </div>
               
                    <table>
                        <tr>
                            <td>Mật khẩu cũ</td>
                            <td><input type="password" size="25" class="mkcu"></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu mới</td>
                            <td><input type="password" size="25" class="mkmoi"></td>
                        </tr>
                        <tr>
                            <td>Xác nhận Mật khẩu</td>
                            <td><input type="password" size="25" class="remkmoi"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="capnhatmk" style="margin-right: 10px;width: 70px;background: #f57812;color: #FFF; border: none;height: 30px;">Cập nhật</button><button class="closedoimatkhau" style="margin-right: 10px;width: 70px;background: #f57812;color: #FFF; border: none;height: 30px;">Thoát</button></td>
                        </tr>
                    </table>
                            </div>
        </div>
    </div>
    <div class="mainthongtinkhach">
        <div class="tenthongtinkhach"><h4>THÔNG TIN CÁ NHÂN</h4></div>
        @foreach($thongtinkhach as $t)
        <table>
            <tr>
                <td><strong>Số điện thoại: </strong></td>
                <td>{{$t->Sđt}}</td>
            </tr>
            <tr>
                <td><strong>Tên:  </strong></td>
                @if($t->Tên != NULL)
                    <td class="tenkh">{{$t->Tên}}</td>
                @else
                    <td><span>Thông tin chưa cập nhật !</span></td>
                @endif
            </tr>
            <tr>
                <td><strong>Ngày sinh: </strong></td>
                @if($t->Ngày_sinh != Null)
                <td class="ngaysinhkh">{{$t->Ngày_sinh}}</td>
                 @else
                    <td><span>Thông tin chưa cập nhật !</span></td>
                @endif
            </tr>
            <tr>
                <td><strong>Giới tính: </strong></td>
                @if($t->{"Giới tính"} != Null)
                    @if($t->{"Giới tính"} == 1)
                        <td>Nam</td>
                    @else
                        <td>Nữ</td>
                    @endif
                @else
                    <td><span>Thông tin chưa cập nhật !</span></td>
                @endif
            </tr>
            <tr>
                <td><strong>Địa chỉ: </strong></td>
                @if($t->{"Địa chỉ"} != Null)
                    <td class="diachikh">{!!$t->{"Địa chỉ"}!!}</td>
                @else
                    <td><span>Thông tin chưa cập nhật !</span></td>
                @endif
            </tr>
            <tr>
                <td><strong>Email: </strong></td>
                @if($t->Email != Null)
                    <td class="emailkh">{{$t->Email}}</td>
                @else
                    <td><span>Thông tin chưa cập nhật !</span></td>
                @endif
            </tr>
            <tr>
                <td><button class="buttondoithongtin">Đổi thông tin</button></td>
                <td><button class="buttondoimatkhau">Đổi mật khẩu</button></td>
            </tr>
        </table>
        @endforeach
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".buttondoithongtin").click(function(){
                var tenkh = $(".tenkh").html();
                var diachikh = $(".diachikh").html();
                var emailkh = $(".emailkh").html();
                var ngaysinh = $(".ngaysinhkh").html();
                $(".doithongtin").fadeIn();
                $(".dttname").val(tenkh);
                 $(".dttdiachi").val(diachikh);
                  $(".dttemail").val(emailkh);
                  $(".dttngaysinh").val(ngaysinh);
            });
            $(".colsedoithongtin").click(function(){
                $(".doithongtin").fadeOut();
                $(".dnloi").html("");
                $(".dnloi2").html("");
            });
            $(".capnhat").click(function(){
                var kt=true;
                var bieuthuc = /[a-zA-Z][^#&<>\"~;$^%{}?]{1,50}$/;
                var bieuthuc2 = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}$/;
                var name = $(".dttname").val();
                var gioitinh = document.getElementsByName("txtgioitinh");
                 for (var i = 0; i < gioitinh.length; i++){
                    if (gioitinh[i].checked === true){
                       gt = gioitinh[i].value;
                    }
                }
                var ngaysinh = $(".dttngaysinh").val();
                var diachi = $(".dttdiachi").val();
                var email = $(".dttemail").val();
                var ma = {{$thongtinkhach[0]->Mã}};
                 if(name.search(bieuthuc)==-1){
                     $(".dnloi").html("<div class='alert alert-danger'><strong>Tên bạn nhập không hợp lệ !</strong></div>");
                     kt = false;
                 }
                  else{
                    $(".dnloi").html("");
                   }
                 if(email.search(bieuthuc2)==-1){
                     $(".dnloi2").html("<div class='alert alert-danger'><strong>Email bạn nhập không hợp lệ !</strong></div>");
                     kt = false;
                 }
                  else{
                    $(".dnloi").html("");
                   }
                 if(kt==true){
                        $.ajax({
                            url: '{{route("capnhattt")}}',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                MA: ma,
                                NAME: name,
                                NGAYSINH: ngaysinh,
                                GT: gt,
                                DIACHI: diachi,
                                EMAIL: email
                            },
                            success: function (data) {
                               if(data.kq==1){
                                    $(".doithongtin").fadeOut();
                                    location.assign("{{asset('thongtin')}}/"+ma);
                               }
                            }
                     });
                    }
               
            });
                     /*doi mat khau*/
            $(".buttondoimatkhau").click(function(){
                $(".doimatkhau").fadeIn();
            });
            $(".closedoimatkhau").click(function(){
                $(".doimatkhau").fadeOut();
                $(".dmkloi").html("");
                $(".dmkloi2").html("");
                $(".dmkloi3").html("");
                $(".dmkloi4").html("");
                $(".thanhcong").html("");
                $(".mkcu").val("");
                $(".mkmoi").val("");
                $(".remkmoi").val("");
            });
            $(".capnhatmk").click(function(){
                var kt2 = true;
                var xemmk=true;
                var mkcu = $(".mkcu").val();
                var mkmoi =$(".mkmoi").val();
                var remkmoi = $(".remkmoi").val();
                var ma = {{$thongtinkhach[0]->Mã}};
                if(mkcu==""){
                    $(".dmkloi").html("<div class='alert alert-danger'><strong>Mật khẩu cũ không được để trống !</strong></div>");
                    kt2 = false;
                }
                else if(mkcu.length> 30 || mkcu.length <6){
                    $(".dmkloi").html("<div class='alert alert-danger'><strong>Độ dài mật khẩu cũ ít nhất 6 ký tự và  không quá 30 ký tự !</strong></div>");
                    kt2 = false;
                }
                else{
                     $(".dmkloi").html("");
                }
                if(mkmoi==""){
                    $(".dmkloi2").html("<div class='alert alert-danger'><strong>Mật khẩu mới không được để trống !</strong></div>");
                    kt2 = false;
                    xemmk = false;
                }
                else if(mkmoi.length> 30 || mkmoi.length <6){
                    $(".dmkloi2").html("<div class='alert alert-danger'><strong>Độ dài mật khẩu mới ít nhất 6 ký tự và  không quá 30 ký tự !</strong></div>");
                    kt2 = false;
                    xemmk = false;
                }
                else{
                    $(".dmkloi2").html("");
                }
                /*rematkhau*/
                if(remkmoi==""){
                    $(".dmkloi3").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu không được để trống !</strong></div>");
                    kt2 = false;
                     xemmk = false;
                }
                else if(remkmoi.length > 30 || remkmoi.length < 6){
                    $(".dmkloi3").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu có độ dài không đúng!</strong></div>");
                    kt2 = false;
                     xemmk = false;
                }
                else{
                    $(".dmkloi3").html("");
                }
                if(xemmk==true && mkmoi!=remkmoi){
                         $(".dmkloi4").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu không giống mật khẩu!</strong></div>");
                            kt2 = false;
                }
                else{
                    $(".dmkloi4").html("");
                }
               if(kt2==true){
                    $.ajax({
                            url: '{{route("doimatkhau")}}',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                MA: ma,
                                MKCU: mkcu,
                                MKMOI: mkmoi,
                            },
                            success: function (data) {
                               if(data.kq==1){
                                   $(".thanhcong").html("<div class='alert alert-success'><strong>Bạn đổi mật khẩu thành công !</trong></div>");
                               }
                               else{
                                $(".dmkloi").html("<div class='alert alert-danger'><strong>Bạn nhập mật khẩu không đúng !</strong></div>");
                               }
                            }
                     });
               }
            });
        });
    </script>
@endsection

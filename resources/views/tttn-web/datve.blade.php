@extends('tttn-web.main')
@section('title')
    Đặt vé
@endsection
@section('content')
    <!-- Phần bước -->
        <div class="buoc">
            <ul>
                <li style="background: #f57812; color: #FFF;" class="stay">Tìm Chuyến</li>
                <li>Chọn Chuyến</li>
                <li>Chi Tiết Vé</li>
            </ul>
        </div>
    <!-- kết thúc phần bước -->
    <!-- Phần tìm vé -->
        <div class="maindatve">
            <!-- Form thông tin -->
             <form name="timve" action="{{route('chuyenxe1')}}" method="POST">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <ul>
                        <li>
                            <!-- Chọn nơi đi -->
                            <div class="diadiemdatve">
                                <label>Chọn Nơi Khởi Hành </label>
                                <div class="the">
                                    <i class="fa fa-bus"></i>
                                    <select name="Noidi">
                                    @foreach($tinh as $t)
                                    <option>{{$t->Tên}}</option>
                                     @endforeach
                                    </select>
                                </div>
                                <!-- Chọn loại xe -->
                                <div class="chonloaixe">
                                    <p>Chọn loại xe</p>
                                    <form>
                                        <input checked="checked" name="Giuong" type="radio" value="1" />Giường nằm
                                        <br>
                                        <input type="radio" name="Giuong" value="0" />Ghế ngồi
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- Chọn nơi đến -->
                            <div class="diadiemdatve">
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
                        </li>
                        <li>
                            <!-- Chọn ngày đi -->
                            <div class="ngaydidatve">
                                <label>Chọn Thời Gian đi </label>
                                <div class="form-group" style="width: 350px;">
                                    <div class='input-group date' style="box-shadow: 0 3px #F3AD45; ">
                                        <span class="input-group-addon" style="background: #FFF; border: none;">
                                        <span class="glyphicon glyphicon-calendar" style="color: #f57812;"></span>
                                        </span>
                                        <input type='date' class="form-control" style="border: none;" name="Ngaydi" id="txtdate" />
                                    </div>
                                 </div>
                                 <!-- button tìm vé -->
                                <div class="tim">
                                    <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                                     <button type="button" class="btn" onclick="document.forms['timve'].submit();"><a href="javascript:void(0)" >Tìm vé</a></button>
                                </div>
                            </div>
                        </li>
                    </ul>
            </form>
        <!-- Kết thúc form thông tin -->
        </div>
    <!-- Kết thúc phần tìm vé -->
@endsection
@section('script')
    <script type="text/javascript">
        /*Xử lý input date*/
        function chonngay(){
            var d = new Date();
            var ngay = d.getDate()<10? ('0'+d.getDate()):d.getDate();
            var thang = d.getMonth() + 1 <10? ('0'+d.getMonth()+1):d.getMonth()+1;
            var nam = d.getFullYear();
            document.getElementById("txtdate").min=nam+"-"+thang+"-"+ngay;
            document.getElementById("txtdate").value= nam+"-"+thang+"-"+ngay;
        }
        chonngay();
    </script>
@endsection
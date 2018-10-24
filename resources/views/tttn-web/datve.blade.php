@extends('tttn-web.main')
@section('title')
    Đặt vé
@endsection
@section('content')
    <div class="buoc">
        <ul>
            <li style="background: #f57812; color: #FFF;" class="stay">Tìm Chuyến</li>
            <li>Chọn Chuyến</li>
            <li>Chi Tiết Vé</li>
        </ul>
    </div>
    <div class="maindatve">
         <form name="timve" action="{{route('chuyenxe1')}}" method="POST">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
        <ul>
            <li>
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
                <div class="ngaydidatve">
                    <label>Chọn Thời Gian đi </label>
                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> <input class="form-control" readonly="" type="text" name="Ngaydi"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    <div class="tim">
                        <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                         <button type="button" class="btn" onclick="document.forms['timve'].submit();"><a href="javascript:void(0)" >Tìm vé</a></button>
                    </div>
                </div>
            </li>
        </ul>
        </form>

    </div>
@endsection

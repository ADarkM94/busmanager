@extends('tttn-web.main')
@section('title')
    Đặt vé
@endsection
@section('content')
    <div class="maindatve">
        <div class="timchuyendidatve"><h3>Tìm chuyến đi</h3></div>
        <ul>
            <li>
                <div class="diadiemdatve">
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
                    <div class="chonloaixe">
                        <p>Chọn loại xe</p>
                        <form>
                            <input checked="checked" name="gioitinh" type="radio" />Giường nằm
                            <br>
                            <input type="radio" name="gioitinh" />Ghế ngồi
                        </form>
                    </div>
                </div>
            </li>
            <li>
                <div class="diadiemdatve">
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
            </li>
            <li>
                <div class="ngaydidatve">
                    <label>Chọn Thời Gian đi </label>
                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> <input class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    <div class="tim">
                        <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                        <button type="button" class="btn"><a href="chuyenxe">Tìm vé</a></button>
                    </div>
                </div>
            </li>
        </ul>

    </div>
@endsection
@section('script')
    <script type="text/javascript" src="js/date.js"></script>
@endsection

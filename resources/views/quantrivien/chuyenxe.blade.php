@extends('quantrivien.main')
@section('content')
   {{-- <div class="content datve row show">
        <div class="col-lg-4">
            <div class="searchroute">
                <span>Tìm chuyến xe</span>
                <form>
                    <div>
                        <div class="input-group">
                            <span class="input-group-addon">Nơi đi</span>
                            <input type="text" name="noidi" class="form-control" list="diadiem" placeholder="Nơi đi">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Nơi đến</span>
                            <input type="text" name="noiden" class="form-control" list="diadiem" placeholder="Nơi đến">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Ngày đi</span>
                            <input type="date" name="ngaydi" class="form-control">
                        </div>
                        <br>
                        <div class="selecttype">
                            <span>Loại xe</span>
                            <label class="radio-inline"><input type="radio" name="loaighe" value="ghe">Ghế ngồi</label>
                            <label class="radio-inline"><input type="radio" name="loaighe" value="giuong">Giường nằm</label>
                        </div>
                    </div>
                </form>
                <span class="glyphicon glyphicon-search"></span>
            </div>
            <div class="searchresult">
                <div class="chuyenxe">
                    <ul>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ban-circle" style="color: gray;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ttdatve">
                <span>Thông tin đặt vé</span>
                <hr>
                <form class="form-vertical">
                    <input type="text" name="hoten" class="form-control" placeholder="Họ tên">
                    <br>
                    <input type="text" name="sodienthoai" class="form-control" placeholder="Số điện thoại">
                    <br>
                    <input type="text" name="cmnd" class="form-control" placeholder="CMND">
                    <br>
                    <input type="text" name="noidonkhach" class="form-control" placeholder="Nơi đón khách">
                    <br>
                    <input type="text" name="noidi" class="form-control" list="diadiem" placeholder="Nơi đi">
                    <br>
                    <input type="text" name="noiden" class="form-control" list="diadiem" placeholder="Nơi đến">
                </form>
                <span data-toggle="modal" data-target="#modaldadat">Vé đã đặt</span>
                <br>
                <span data-toggle="modal" data-target="#modaldatve">Đặt vé</span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="searchcustomer">
                <span>Tìm Khách Hàng</span>
                <form>
                    <div>
                        <input type="text" name="searchkh" class="form-control" placeholder="Search">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </form>
                <div class="kqtimkh">
                    <ul>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                        <li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
@section('excontent')
    {{--<datalist id="diadiem" style="display: none;">
        <option>Quảng Ngãi</option>
        <option>Quảng Nam</option>
        <option>Đà Nẵng</option>
        <option>Sài Gòn</option>
        <option>Bình Định</option>
        <option>Hà Nội</option>
    </datalist>
    <div id="modaldatve" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Chuyến xe #</div>
                </div>
                <div class="modal-body">
                    <form id="ttchuyenxe">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Nơi đi</label>
                                <input type="text" name="noidi" class="form-control" placeholder="Điểm đi" readonly="">
                            </div>
                            <div class="col-lg-6">
                                <label>Nơi đến</label>
                                <input type="text" name="noiden" class="form-control" placeholder="Điểm đến" readonly="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Thời gian đi</label>
                                <input type="text" name="thoigiandi" class="form-control" placeholder="Thời gian đi" readonly="">
                            </div>
                            <div class="col-lg-6">
                                <label>Thời gian đến dự kiến</label>
                                <input type="text" name="thoigianden" class="form-control" placeholder="Thời gian đến dự kiến" readonly="">
                            </div>
                        </div>
                    </form>
                    <span>Sơ đồ xe</span>
                    <label class="checkbox-inline"><input type="checkbox" name="multi">Chọn nhiều chỗ</label>
                    <div class="sodoxe">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                                <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <br>
                    <span>Chọn</span>
                </div>
            </div>
        </div>
    </div>
    <div id="modaldadat" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Vé đặt</div>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                        <li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-12">
                        <label>Tổng tiền</label>
                        <input type="text" name="tongtien" class="form-control" placeholder="Tổng tiền" readonly="">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <span>Xác nhận</span>
                        </div>
                        <div class="col-lg-6">
                            <span>Hoàn tác</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[2].classList.add('selected');
        option[2].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/chuyenxe-hover.png")}}');
    </script>
@endsection

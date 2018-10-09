@extends('quantrivien.main')
@section('content')
    <div class="content lotrinh row show">
        <div class="col-lg-7">
            <div id="busroute">
            </div>
        </div>
        <div class="col-lg-5">
            <div class="district">
            </div>
        </div>
    </div>
@endsection
@section('excontent')
   {{-- <datalist id="diadiem" style="display: none;">
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
        option[4].classList.add('selected');
        option[4].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/route-hover.png")}}');
        $(function () {
            var obj1 = {
                width: '100%',
                height: '100%',
                showTop: false,
                showBottom: false,
                collapsible: false,
                showHeader: true,
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {autoFit: true},
                resizable: false,
                roundCorners: false,
                rowBorders: false,
                columnBorders: false,
                postRenderInterval: -1,
                selectionModel: { type: 'row', mode: 'single' },
                numberCell: { show: false },
                stripeRows: false,
                /*cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addnhanvien')}}" + "/" + ui.rowData["Mã"]);
                }*/
            };
            obj1.colModel = [
                {
                    title: "ID",
                    width: 50,
                    dataIndx: "Mã",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nơi đi",
                    width: 100,
                    dataIndx: "Nơi_đi",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nơi đến",
                    width: 150,
                    dataIndx: "Nơi_đến",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nhân viên tạo",
                    width: 150,
                    dataIndx: "Mã_nhân_viên_tạo",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nhân viên chỉnh sửa",
                    width: 150,
                    dataIndx: "Mã_nhân_viên_chỉnh_sửa",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Các trạm dừng",
                    width: 100,
                    dataIndx: "Các_trạm_dừng_chân",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Action",
                    width: 100,
                    editor: false,
                    dataIndx: "View",
                    render: function (ui) {
                        var str = '';
                        str += '<a title="Edit" id="idEditBusRoute" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelBusRoute" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEdiBusRoute")
                            .unbind("click")
                            .bind("click", function (evt) {
                                editModel(rowData["Mã"],rowData["Tên_Loại"],rowData["Số_hàng"],rowData["Số_cột"],rowData["Sơ_đồ"]);
                            });
                        $cell.find("a#idDelBusRoute")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign("{{url('admin/delloaixe')}}"+"/"+rowData["Mã"]);
                            });
                    }
                }
            ];

            obj1.dataModel = {
                data: {!! json_encode($busroute) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj1.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#busmodel").pqGrid(obj1);
            $grid.pqGrid("refreshDataAndView");
        });
    </script>
@endsection

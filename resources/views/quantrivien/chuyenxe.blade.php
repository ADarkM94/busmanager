@extends('quantrivien.main')
@section('content')
    <div class="content row show">
        <div style="height: 50%; width: 100%; position: relative; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Chuyến Xe</h4>
            <div id="chuyenxe">
            </div>
            <a href="javascript:void(0)" onclick="window.open('{{url("admin/addchuyenxe")}}')" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="javascript:void(0)" onclick="refreshCX()" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
        <div style="height: 50%; width: 100%; position: relative; padding: 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Chuyến Xe</h4>
            <div id="ticket">
            </div>
            <a href="javascript:void(0)" onclick="window.open('{{url("admin/addve")}}')" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="javascript:void(0)" onclick="refreshVE()" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
    </div>
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
                window.open( + "/" + ui.rowData["Mã"]);
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
                width: 100,
                dataIndx: "Nhân_viên_tạo",
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
                title: "Tài xế",
                width: 100,
                dataIndx: "Tài_xế",
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
                title: "Xe biển số",
                width: 100,
                dataIndx: "Biển_số",
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
                    $cell.find("a#idEditBusRoute")
                        .unbind("click")
                        .bind("click", function (evt) {
                            document.forms["addbusroute"]["noidi"].value = rowData["Nơi_đi"];
                            document.forms["addbusroute"]["noiden"].value = rowData["Nơi_đến"];
                            var tramdungs =document.getElementsByClassName("busstops");
                            document.forms["addbusroute"]["ID"].value = rowData["Mã"];
                            var arr = rowData["Các_trạm_dừng_chân"].split(",");
                            var i = arr.length - 1;
                            var j = tramdungs.length - 1;
                            while( i >= 0 && j >= 0) {
                                if (tramdungs[j].value == arr[i]){
                                    tramdungs[j].checked = true;
                                    i--;
                                }
                                j--;
                            }
                            document.getElementById("btnsubmit").innerHTML="Sửa Lộ Trình";
                            $("#addlotrinh").modal("show");
                        });
                    $cell.find("a#idDelBusRoute")
                        .unbind("click")
                        .bind("click", function (evt) {
                            if(confirm("Bạn chắc chắn muốn xóa?")){
                                delbusroute(rowData["Mã"]);
                            }
                        });
                }
            }
        ];
        var obj2 = {
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
            cellDblClick: function (event,ui) {
                window.open("{{url('/admin/addnhanvien')}}" + "/" + ui.rowData["Mã"]);
            }
        };
        obj2.colModel = [
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
                title: "Nhân viên đặt",
                width: 100,
                dataIndx: "Nhân_viên_đặt",
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
                title: "Mã Khách Hàng",
                width: 150,
                dataIndx: "Mã_khách_hàng",
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
                title: "Vị trí ghế",
                width: 100,
                dataIndx: "Vị_trí_giá",
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
                title: "Giá",
                width: 200,
                dataIndx: "Giá",
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
                title: "Trạng thái",
                width: 100,
                dataIndx: "Trạng_thái",
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
                title: "Action",
                width: 100,
                editor: false,
                dataIndx: "View",
                render: function (ui) {
                    var str = '';
                    str += '<a title="Edit" id="idEditEmployee" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    str += '<a title="Delete" id="idDelEmployee" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    return str;
                },
                postRender: function (ui) {
                    var rowData = ui.rowData,
                        $cell = this.getCell(ui);
                    //add button
                    $cell.find("a#idEditEmployee")
                        .unbind("click")
                        .bind("click", function (evt) {
                            window.open("{{url('admin/addnhanvien')}}"+"/"+rowData["Mã"]);
                        });
                    $cell.find("a#idDelEmployee")
                        .unbind("click")
                        .bind("click", function (evt) {
                            if(confirm("Bạn chắc chắn muốn xóa?"))
                                location.assign("{{url('admin/delnhanvien')}}"+"/"+rowData["Mã"]);
                        });
                }
            }
        ];
        $(function () {

            obj1.dataModel = {
                data: {!! json_encode($chuyenxe) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj1.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid1 = $("#chuyenxe").pqGrid(obj1);
            $grid1.pqGrid("refreshDataAndView");
            obj2.dataModel = {
                data: {!! json_encode($ticket) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj2.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid2 = $("#ticket").pqGrid(obj2);
            $grid2.pqGrid("refreshDataAndView");
        });
    </script>
@endsection

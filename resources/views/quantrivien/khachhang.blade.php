@extends('quantrivien.main')
@section('content')
    <div class="content khachhang show">
        <div id="customer"></div>
    </div>
    <a href="javascript:void(0)" onclick="window.open('{{url("admin/addkhachhang")}}')" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
        <i class="glyphicon glyphicon-plus"></i>
    </a>
    <a href="javascript:void(0)" onclick="refreshKH()" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
        <i class="glyphicon glyphicon-refresh"></i>
    </a>
@endsection
@section('excontent')
    <datalist id="diadiem" style="display: none;">
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
    </div>
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[1].classList.add('selected');
        $(function () {
            var obj = {
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
                hwrap: true,
                columnBorders: false,
                selectionModel: { type: 'row', mode: 'single' },
                numberCell: { show: false },
                stripeRows: false,
                cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addkhachhang')}}" + "/" + ui.rowData["Mã"]);
                }
            };
            obj.colModel = [
                {
                    title: "ID",
                    width: 100,
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
                    title: "Name",
                    width: 200,
                    dataIndx: "Tên",
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
                    title: "Giới tính",
                    width: 70,
                    dataIndx: "Giới tính",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function (ui) {
                        switch(ui.rowData["Giới tính"]){
                            case "0":
                                return "Không xác định";
                                break;
                            case "1":
                                return "Nam";
                                break;
                            case "2":
                                return "Nữ";
                                break;
                        }
                    },
                    filter: {
                        type: "select",
                        condition: "equal",
                        options: [
                            {"":"All"},
                            {"1":"Nam"},
                            {"2":"Nữ"},
                            {"0":"Không xác định"}
                            ],
                        listeners: ["change"]
                    }
                },
                {
                    title: "Email",
                    width: 200,
                    dataIndx: "Email",
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
                    title: "Phone",
                    width: 170,
                    dataIndx: "Sđt",
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
                        str += '<a title="Edit" id="idEditCustomer" ><i class="glyphicon glyphicon-edit  text-yellow"></i></a>';
                        return str;
                    },
                    /*postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditCustomer")
                            .unbind("click")
                            .bind("click", function (evt) {
                                window.open("w3schools.com");
                            });
                    }*/
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($customer) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#customer").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
            function editRowCustomer(e) {
                alert(e);
            }
        });
        function refreshKH(){
            $("#customer").pqGrid("reset",{filter : true});
        }
    </script>
@endsection

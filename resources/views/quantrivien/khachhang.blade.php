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
    <div id="viewkhachhang" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Thông Tin Khách Hàng</div>
                </div>
                <div class="modal-body">
                    <form name="ttkhachhang">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Tên</label>
                                <input type="text" name="name" class="form-control" readonly="">
                                <br>
                                <label>Giới tính</label>
                                <input type="text" name="gender" class="form-control" readonly="">
                                <br>
                                <label>Ngày sinh</label>
                                <input type="date" name="brtday" class="form-control" readonly="">
                                <br>
                                <label>Địa chỉ</label>
                                <input type="text" name="address" class="form-control" readonly="">
                            </div>
                            <div class="col-lg-6">
                                <label>Nickname</label>
                                <input type="text" name="nickname" class="form-control" readonly="">
                                <br>
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" readonly="">
                                <br>
                                <label>Số điện thoại</label>
                                <input type="tel" name="phone" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <h4>Các chuyến xe đã đi</h4>
                            <div id="chuyendi" style="height: 200px;">
                            </div>
                        </div>
                    </form>
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
        option[1].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/customer-hover.png")}}');
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
                postRenderInterval: -1,
                hwrap: true,
                columnBorders: false,
                selectionModel: { type: 'row', mode: 'single' },
                numberCell: { show: false },
                stripeRows: false,
                cellDblClick: function (event,ui) {
                    viewkhachhang(ui.rowData["Mã"],ui.rowData["Tên"],ui.rowData["Ngày_sinh"],ui.rowData["Giới tính"],ui.rowData["Địa chỉ"],ui.rowData["Nickname"],ui.rowData["Email"],ui.rowData["Sđt"]);
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
                        str += '<a title="Edit" id="idEditCustomer" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelCustomer" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditCustomer")
                            .unbind("click")
                            .bind("click", function (evt) {
                                window.open("{{url('admin/addkhachhang')}}"+"/"+rowData["Mã"]);
                            });
                        $cell.find("a#idDelCustomer")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign("{{url('admin/delkhachhang')}}"+"/"+rowData["Mã"]);
                            });
                    }
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
        });
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
            postRenderInterval: -1,
            hwrap: true,
            columnBorders: false,
            selectionModel: { type: 'row', mode: 'single' },
            numberCell: { show: false },
            stripeRows: false,
            cellDblClick: function (event,ui) {
                viewkhachhang(ui.rowData["Mã"],ui.rowData["Tên"],ui.rowData["Ngày_sinh"],ui.rowData["Giới tính"],ui.rowData["Địa chỉ"],ui.rowData["Nickname"],ui.rowData["Email"],ui.rowData["Sđt"]);
            }
        };
        obj1.colModel = [
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
                width: 200,
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
                title: "Ghế",
                width: 70,
                dataIndx: "Vị_trí",
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
            }
        ];
        function viewkhachhang(id,name,brtday,gender,address,nickname,email,phone) {
            document.forms["ttkhachhang"]["name"].value = name;
            document.forms["ttkhachhang"]["brtday"].value = brtday;
            switch (gender) {
                case '0':
                    document.forms["ttkhachhang"]["gender"].value = "Không xác định";
                    break;
                case '1':
                    document.forms["ttkhachhang"]["gender"].value = "Nam";
                    break;
                case '2':
                    document.forms["ttkhachhang"]["gender"].value = "Nữ";
                    break;
                default:
            }
            document.forms["ttkhachhang"]["address"].value = address;
            document.forms["ttkhachhang"]["nickname"].value = nickname;
            document.forms["ttkhachhang"]["email"].value = email;
            document.forms["ttkhachhang"]["phone"].value = phone;
            $.ajax({
                url: {{route('viewkhachhang')}},
                method: 'post',
                data: {
                    _token: {!! csrf_token() !!},
                    id: id
                },
                success: function (data) {
                    obj1.dataModel = {
                        data: {!! json_encode($ttchuyendi) !!},
                        location: "local",
                        sorting: "local",
                        sortDir: "down"
                    };
                    obj1.pageModel = {type: 'local', rPP: 5, rPPOptions: [5, 10, 15, 20]};
                    var $grid = $("#chuyendi").pqGrid(obj1);
                    $grid.pqGrid("refreshDataAndView");
                }
            });
            $("#viewkhachhang").modal('show');
        }
        function refreshKH(){
            $("#customer").pqGrid("reset",{filter : true});
        }
    </script>
@endsection

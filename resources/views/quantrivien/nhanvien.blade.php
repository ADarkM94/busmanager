@extends('quantrivien.main')
@section('content')
    <div class="content nhanvien row show" style="overflow: hidden; position: relative; padding: 3em 1em 1em;">
        <h4 style="padding: .5em; position: absolute; top: 0; left: 0; width: 100%;">Bảng Nhân Viên</h4>
        <div id="employee"></div>
        <div class="nutthaotac" style="padding-right: 0;">
            <a href="javascript:void(0)" onclick="window.open('{{url("admin/addnhanvien")}}')" title="Thêm Nhân Viên">
                <i class="glyphicon glyphicon-plus"></i>Thêm
            </a>
            <a href="javascript:void(0)" onclick="refreshNV()" title="Làm Mới">
                <i class="glyphicon glyphicon-refresh"></i>Refresh
            </a>
        </div>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[5].classList.add('selected');
        option[5].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/partnership-hover.png")}}');
        $(function () {
            var obj = {
                width: '100%',
                height: '100%',
                showTop: false,
                showBottom: false,
                collapsible: false,
                showHeader: true,
                filterModel: {on: true, mode: "AND", header: true},
                // scrollModel: {autoFit: true},
                resizable: false,
                roundCorners: false,
                rowBorders: true,
                columnBorders: false,
                postRenderInterval: -1,
                selectionModel: { type: 'row', mode: 'single' },
                hoverMode: 'row',
                numberCell: { show: true, title: 'STT', width: 50, align: 'center'},
                stripeRows: true,
                freezeCols: 1,
                cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addnhanvien')}}" + "/" + ui.rowData["Mã"]);
                }
            };
            obj.colModel = [
                {
                    title: "Thao tác",
                    width: 100,
                    editor: false,
                    dataIndx: "View",
                    align: 'center',
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
                },
                {
                    title: "Loại NV",
                    width: 100,
                    dataIndx: "Loại_NV",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    render: function (ui) {
                        switch (ui.rowData["Loại_NV"]){
                            case "QTV":
                                return "Quản trị viên";
                                break;
                            case "QLDV":
                                return "Quản lý đặt vé";
                                break;
                            case "TX":
                                return "Tài xế";
                                break;
                            default:
                                break;
                        }
                    },
                    filter: {
                        type: "select",
                        condition: "equal",
                        options: [
                            {"":"All"},
                            {"QTV":"Quản trị viên"},
                            {"QLDV":"Quản lý đặt vé"},
                            {"TX":"Tài xế"}
                        ],
                        listeners: ["change"]
                    }
                },
                {
                    title: "Tên",
                    width: 150,
                    dataIndx: "Họ_Tên",
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
                    width: 100,
                    dataIndx: "Giới_tính",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function (ui) {
                        switch(ui.rowData["Giới_tính"]){
                            case "0":
                                return "Không xác định";
                                break;
                            case "1":
                                return "Nam";
                                break;
                            case "2":
                                return "Nữ";
                                break;
                            default:
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
                    title: "Ngày sinh",
                    width: 200,
                    dataIndx: "Ngày_sinh",
                    dataType: "date",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox', condition: 'between', init: pqDatePicker,
                        listeners: [{
                            'change': function (evt, ui) {
                                if (ui.value != "") {
                                    var d1 = ui.value.split('/');
                                    ui.value = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                if (ui.value2 != "") {
                                    var d1 = ui.value2.split('/');
                                    ui.value2 = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                var $grid = $(this).closest(".pq-grid");
                                $grid.pqGrid("filter", {
                                    oper: 'add',
                                    data: [ui]
                                });
                            }
                        }]},
                    render: function(ui){
                        var cellData = ui.cellData;
                        var str = '';
                        if (cellData != "") {
                            var d1 = cellData.split('-');
                            str += d1[2] + '/' + d1[1] + '/' + d1[0];
                        }
                        return {text: str};
                    }
                },
                {
                    title: "Tên đăng nhập",
                    width: 200,
                    dataIndx: "Username",
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
                    title: "Email",
                    width: 300,
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
                    title: "Số điện thoại",
                    width: 200,
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
                    title: "Địa chỉ",
                    width: 100,
                    dataIndx: "Địa_chỉ",
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
                    title: "Chi nhánh",
                    width: 100,
                    dataIndx: "Chi_nhánh",
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
                    title: "Bằng lái",
                    width: 100,
                    dataIndx: "Bằng_lái",
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
                    title: "Ngày bắt đầu",
                    width: 200,
                    dataIndx: "Date_Starting",
                    dataType: "date",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox', condition: 'between', init: pqDatePicker,
                        listeners: [{
                            'change': function (evt, ui) {
                                if (ui.value != "") {
                                    var d1 = ui.value.split('/');
                                    ui.value = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                if (ui.value2 != "") {
                                    var d1 = ui.value2.split('/');
                                    ui.value2 = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                var $grid = $(this).closest(".pq-grid");
                                $grid.pqGrid("filter", {
                                    oper: 'add',
                                    data: [ui]
                                });
                            }
                        }]},
                    render: function(ui){
                        var cellData = ui.cellData;
                        var str = '';
                        if (cellData != "") {
                            var d1 = cellData.split('-');
                            str += d1[2] + '/' + d1[1] + '/' + d1[0];
                        }
                        return {text: str};
                    }
                    /*filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }*/
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($employee) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#employee").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
        function refreshNV(){
            $("#employee").pqGrid("reset",{filter : true});
        }
    </script>
@endsection

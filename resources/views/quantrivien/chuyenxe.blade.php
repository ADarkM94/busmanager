@extends('quantrivien.main')
@section('content')
    <div class="content row show">
        <div style="height: 50%; width: 100%; position: relative; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Chuyến Xe</h4>
            <div id="chuyenxe">
            </div>
            <div class="nutthaotac">
                <a href="javascript:void(0)" onclick="window.open('{{url("admin/addchuyenxe")}}')" title="Thêm Chuyến Xe">
                    <i class="glyphicon glyphicon-plus"></i>Thêm
                </a>
                <a href="javascript:void(0)" onclick="refresh(1)" title="Làm Mới">
                    <i class="glyphicon glyphicon-refresh"></i>Reset
                </a>
            </div>
        </div>
        <div style="height: 50%; width: 100%; position: relative; padding: 3em 1em 1em; border-top: 2px solid #004964;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Vé Xe</h4>
            <div id="ticket">
            </div>
            <div class="nutthaotac">
                <a href="javascript:void(0)" onclick="refresh(2)" title="Làm Mới">
                    <i class="glyphicon glyphicon-refresh"></i>Reset
                </a>
            </div>
        </div>
    </div>
@endsection
@section('excontent')
    <div id="editve" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Thông Tin Vé</div>
                </div>
                <div class="modal-body">
                    <form name="editticket">
                        <input type="hidden" name="ID" value="">
                        <div class="row">
                            <div class="col-lg-6" style="font-size: 1em; width: 50%">
                                <label>Giá</label>
                                <input type="number" min="0" class="form-control" name="giave" placeholder="Giá vé" readonly>
                            </div>
                            <div class="col-lg-6" style="width: 50%; text-align: left;">
                                <label>Trạng thái</label>
                                <select class="form-control" name="trangthai">
                                    <option value="0">Waiting</option>
                                    <option value="1">Booked</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Banned</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button class="btn btn-success" id="btnsubmit" onclick="editVe()">Sửa Thông Tin Vé</button>
                </div>
            </div>
        </div>
    </div>
    <div id ="btnnotice">
        <div id="comment">
            Khi tạo chuyến xe, Vé sẽ được tự động tạo tương ứng với số ghế của loại xe dùng để chuyên chở trong chuyến xe!
        </div>
    </div>
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
            /*cellDblClick: function (event,ui) {
                window.open( + "/" + ui.rowData["Mã"]);
                }*/
        };
        obj1.colModel = [
            {
                title: "Thao tác",
                width: 100,
                editor: false,
                dataIndx: "View",
                align: 'center',
                render: function (ui) {
                    var str = '';
                    str += '<a title="Edit" id="idEditChuyenXe" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    str += '<a title="Delete" id="idDelChuyenXe" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    return str;
                },
                postRender: function (ui) {
                    var rowData = ui.rowData,
                        $cell = this.getCell(ui);
                    //add button
                    $cell.find("a#idEditChuyenXe")
                        .unbind("click")
                        .bind("click", function (evt) {
                            window.open('{{url("/admin/addchuyenxe")}}/'+rowData['Mã']);
                        });
                    $cell.find("a#idDelChuyenXe")
                        .unbind("click")
                        .bind("click", function (evt) {
                            if(confirm("Bạn chắc chắn muốn xóa?")){
                                location.assign('{{url("/admin/delchuyenxe")}}/'+rowData['Mã']);
                            }
                        });
                }
            },
            {
                title: "Nơi đi",
                width: 150,
                dataIndx: "Nơi_đi",
                dataType: "string",
                editor: false,
                align: 'center',
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Nơi đi"',
                    cls: 'filterstyle',
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
                    attr: 'placeholder="Tìm theo Nơi đến"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Nhân viên tạo",
                width: 150,
                dataIndx: "Nhân_viên_tạo",
                dataType: "string",
                editor: false,
                align: "center",
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Nhân viên tạo"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Tài xế",
                width: 150,
                dataIndx: "Tài_xế",
                dataType: "string",
                editor: false,
                align: "center",
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Tài xế"',
                    cls: 'filterstyle',
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
                    attr: 'placeholder="Tìm theo Biển số"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Loại ghế",
                width: 100,
                dataIndx: "Loại_ghế",
                dataType: "string",
                editor: false,
                align: "center",
                render: function(ui){
                    if(ui.rowData["Loại_ghế"]==0)
                        return "Ghế ngồi";
                    else if(ui.rowData["Loại_ghế"])
                        return "Giường nằm";
                },
                filter: {
                    type: 'select',
                    condition: 'equal',
                    listeners: ['change'],
                    options: [
                        {'':'[All]'},
                        {'0':'Ghế ngồi'},
                        {'1':'Giường nằm'}
                    ]
                }
            },
            {
                title: "Ngày xuất phát",
                width: 200,
                dataIndx: "Ngày_xuất_phát",
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
                title: "Giờ xuất phát",
                width: 150,
                dataIndx: "Giờ_xuất_phát",
                dataType: "string",
                editor: false,
                align: "center",
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Giờ xuất phát"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Tiền vé",
                width: 100,
                dataIndx: "Tiền_vé",
                dataType: "string",
                editor: false,
                align: "center",
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Tiền vé"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
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
            /*cellDblClick: function (event,ui) {
            }*/
        };
        obj2.colModel = [
            {
                title: "Thao tác",
                width: 100,
                editor: false,
                dataIndx: "View",
                align: 'center',
                render: function (ui) {
                    var str = '';
                    str += '<a title="Edit" id="idEditTicket" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    return str;
                },
                postRender: function (ui) {
                    var rowData = ui.rowData,
                        $cell = this.getCell(ui);
                    //add button
                    $cell.find("a#idEditTicket")
                        .unbind("click")
                        .bind("click", function (evt) {
                            document.forms["editticket"]["ID"].value = rowData["Mã"];
                            document.forms["editticket"]["giave"].value = rowData["Tiền_vé"];
                            document.forms["editticket"]["trangthai"].value = rowData["Trạng_thái"];
                            $("#editve").modal('show');
                        });
                }
            },
            {
                title: "Trạng thái",
                width: 100,
                dataIndx: "Trạng_thái",
                dataType: "string",
                editor: false,
                align: 'center',
                render: function(ui){
                    switch(ui.rowData["Trạng_thái"]){
                        case 0:
                            return '<small style="font-size: .8em;" class="btn btn-default">Waiting</small>';
                            break;
                        case 1:
                            return '<small style="font-size: .8em;" class="btn btn-success">Booked</small>';
                            break;
                        case 2:
                            return '<small style="font-size: .8em;" class="btn btn-warning">Completed</small>';
                            break;
                        case 3:
                            return '<small style="font-size: .8em;" class="btn btn-danger">Banned</small>';
                            break;
                    }
                },
                filter: {
                    type: 'select',
                    condition: 'equal',
                    options: [
                        {'':'All'},
                        {'0':'Waiting'},
                        {'1':'Booked'},
                        {'2':'Completed'},
                        {'3':'Banned'}
                    ],
                    listeners: ['change']
                }
            },
            {
                title: "Mã chuyến xe",
                width: 150,
                dataIndx: "Mã_chuyến_xe",
                dataType: "string",
                editor: false,
                align: 'center',
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Mã chuyến xe"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Nhân viên đặt",
                width: 150,
                dataIndx: "Nhân_viên_đặt",
                dataType: "string",
                editor: false,
                align: 'center',
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Nhân viên đặt"',
                    cls: 'filterstyle',
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
                    attr: 'placeholder="Tìm theo Mã khách hàng"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Vị trí ghế",
                width: 100,
                dataIndx: "Vị_trí_ghế",
                dataType: "string",
                editor: false,
                align: "center",
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Vị trí ghế"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            },
            {
                title: "Loại ghế",
                width: 100,
                dataIndx: "Loại_ghế",
                dataType: "string",
                editor: false,
                align: "center",
                render: function(ui){
                    if(ui.rowData["Loại_ghế"]==0)
                        return "Ghế ngồi";
                    else if(ui.rowData["Loại_ghế"])
                        return "Giường nằm";
                },
                filter: {
                    type: 'select',
                    condition: 'equal',
                    listeners: ['change'],
                    options: [
                        {'':'[All]'},
                        {'0':'Ghế ngồi'},
                        {'1':'Giường nằm'}
                    ]
                }
            },
            {
                title: "Giá",
                width: 200,
                dataIndx: "Tiền_vé",
                dataType: "string",
                editor: false,
                align: 'center',
                filter: {
                    type: 'textbox',
                    attr: 'placeholder="Tìm theo Giá vé"',
                    cls: 'filterstyle',
                    condition: 'contain',
                    listeners: ['keyup']
                }
            }
            /*{
                title: "Ẩn",
                width: 100,
                dataIndx: "is_hide",
                dataType: "string",
                editor: false,
                align: 'center',
                render: function(ui){
                    if(ui.rowData["is_hide"]==1){
                        return "<i class='glyphicon glyphicon-remove-circle' style='color: grey'></i>";
                    }
                    else {
                        return "<i class='glyphicon glyphicon-ok-circle' style='color: lightgreen'></i>";
                    }
                },
                filter: {
                    type: 'select',
                    condition: 'equal',
                    options: [
                        {'':'All'},
                        {'0':'Show'},
                        {'1':'Hide'},
                    ],
                    listeners: ['change']
                }
            },*/
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
            obj2.pageModel = {type: 'local', rPP: 10, rPPOptions: [10, 20, 30, 50]};
            var $grid2 = $("#ticket").pqGrid(obj2);
            $grid2.pqGrid("refreshDataAndView");
        });
        function refresh(index) {
            $.ajax({
                type:'GET',
                url:'{{asset("/admin/ticket")}}/'+index,
                success:function(data){
                    if (index == 1) {
                        obj1.dataModel = {
                            data: data.msg,
                            location: "local",
                            sorting: "local",
                            sortDir: "down"
                        };
                        obj1.pageModel = {type: 'local', rPP: 10, rPPOptions: [10, 20, 30, 50]};
                        var $grid1 = $("#chuyenxe").pqGrid(obj1);
                        $grid1.pqGrid("refreshDataAndView");
                        $("#chuyenxe").pqGrid("reset",{filter : true});
                    }
                    else if (index == 2) {
                        obj2.dataModel = {
                            data: data.msg,
                            location: "local",
                            sorting: "local",
                            sortDir: "down"
                        };
                        obj2.pageModel = {type: 'local', rPP: 10, rPPOptions: [10, 20, 30, 50]};
                        var $grid2 = $("#ticket").pqGrid(obj2);
                        $grid2.pqGrid("refreshDataAndView");
                        $("#ticket").pqGrid("reset",{filter : true});
                    }
                }
            });
        }
        function editVe() {
            var id = document.forms["editticket"]["ID"].value;
            var trangthai = document.forms["editticket"]["trangthai"].value;
            $.ajax({
                url: '{{route("editticket")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id,
                    trangthai: trangthai
                },
                success: function (data) {
                    if(data.result==1){
                        $("#editve").modal('hide');
                        alert('Sửa thành công');
                        refresh(1);
                        refresh(2);
                    }
                    else {
                        alert('Sửa thất bại');
                    }
                }
            });
        }
    </script>
@endsection

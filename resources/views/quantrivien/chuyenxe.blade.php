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
            <a href="javascript:void(0)" onclick="refresh(1)" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
        <div style="height: 50%; width: 100%; position: relative; padding: 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Chuyến Xe</h4>
            <div id="ticket">
            </div>
            <a href="javascript:void(0)" onclick="refresh(2)" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
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
                                <input type="number" min="0" class="form-control" name="giave" placeholder="Giá vé">
                            </div>
                            <div class="col-lg-6" style="width: 50%; text-align: left;">
                                <label>Trạng thái</label>
                                <select class="form-control" name="trangthai">
                                    <option value="0">Waiting</option>
                                    <option value="1">Booked</option>
                                    <option value="2">Compeleted</option>
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
            /*cellDblClick: function (event,ui) {
            }*/
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
                title: "Mã chuyến xe",
                width: 50,
                dataIndx: "Mã_chuyến_xe",
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
                dataIndx: "Vị_trí_ghế",
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
                render: function(ui){
                  switch(ui.rowData["Trạng_thái"]){
                      case 0:
                          return 'Waiting';
                          break;
                      case 1:
                          return 'Booked';
                          break;
                      case 2:
                          return 'Completed';
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
            },
            {
                title: "Action",
                width: 100,
                editor: false,
                dataIndx: "View",
                render: function (ui) {
                    var str = '';
                    str += '<a title="Edit" id="idEditTicket" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    str += '<a title="Delete" id="idHideTicket" ><i class="glyphicon glyphicon-eye-close  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
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
                            document.forms["editticket"]["giave"].value = rowData["Giá"];
                            document.forms["editticket"]["trangthai"].value = rowData["Trạng_thái"];
                            $("#editve").modal('show');
                        });
                    $cell.find("a#idHideTicket")
                        .unbind("click")
                        .bind("click", function (evt) {
                            if(confirm("Bạn chắc chắn muốn ẩn đi?"))
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
                    }
                }
            });
        }
        function editVe() {
            var id = document.forms["editticket"]["ID"].value;
            var giave = document.forms["editticket"]["giave"].value;
            var trangthai = document.forms["editticket"]["trangthai"].value;
            $.ajax({
                url: '{{route("editticket")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id,
                    name: giave,
                    mavung: trangthai
                },
                success: function (data) {
                    if(data.result==1){
                        $("#editticket").modal('hide');
                        alert('Sửa thành công');
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

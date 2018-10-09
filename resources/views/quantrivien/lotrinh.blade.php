@extends('quantrivien.main')
@section('content')
    <div class="content lotrinh row show">
        <div class="col-lg-7" style="position: relative; height: 100%; font-size: 1em; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Lộ trình</h4>
            <div id="busroute">
            </div>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addlotrinh" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="javascript:void(0)" onclick="getBusRoute()" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
        <div class="col-lg-5" style="position: relative; height: 100%; font-size: 1em; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Các tỉnh</h4>
            <div class="district">
            </div>
        </div>
    </div>
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
    <div id="addlotrinh" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Thêm Lộ trình</div>
                </div>
                <div class="modal-body">
                    <form name="addbusroute">
                        <input type="hidden" name="employeeID" value="1">
                        <div class="row">
                            <div class="col-lg-6" style="font-size: 1em; width: 50%">
                                <label>Nơi đi</label>
                                <input type="text" class="form-control" list="diadiem" name="noidi" placeholder="Địa điểm đi">
                            </div>
                            <div class="col-lg-6" style="width: 50%;">
                                <label>Nơi đến</label>
                                <input type="text" class="form-control" list="diadiem" name="noiden" placeholder="Địa điểm đến">
                            </div>
                        </div>
                        <div class="row" style="padding: 1em 5em;">
                            Chọn các trạm dừng:
                            <br>
                            @foreach($busstops as $busstop)
                                <input type="checkbox" class="busstops" value="{{$busstop['Mã']}}">{{$busstop['Tên']}}
                                <br>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button class="btn btn-success" onclick="addLotrinh()">Thêm Lộ Trình</button>
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
        option[4].classList.add('selected');
        option[4].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/route-hover.png")}}');
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
        $(function () {

            obj1.dataModel = {
                data: {!! json_encode($busroute) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj1.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#busroute").pqGrid(obj1);
            $grid.pqGrid("refreshDataAndView");
        });
        function getBusRoute() {
            $.ajax({
                type:'GET',
                url:'{{asset("/admin/lotrinh")}}/1',
                success:function(data){
                    obj1.dataModel = {
                        data: data.msg,
                        location: "local",
                        sorting: "local",
                        sortDir: "down"
                    };
                    obj1.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
                    var $grid = $("#busroute").pqGrid(obj1);
                    $grid.pqGrid("refreshDataAndView");
                }
            });
        }
        function addLotrinh() {
            var employeeid = document.forms["addbusroute"]["employeeID"].value;
            var noidi = document.forms["addbusroute"]["noidi"].value;
            var noiden = document.forms["addbusroute"]["noiden"].value;
            var tramdungs =document.getElementsByClassName("busstops");
            var busstops = [];
            var j =0;
            for(var i = 0;i<tramdungs.length;i++) {
                if (tramdungs[i].checked) {
                    busstops[j] = tramdungs[i].value;
                    j++;
                }
            }
            busstops = busstops.join(',');
            $.ajax({
                type: 'POST',
                url:'{{route("addbusroute")}}',
                data:{
                    '_token':'{{csrf_token()}}',
                    'employeeID': employeeid,
                    'noidi': noidi,
                    'noiden': noiden,
                    'bustops': busstops
                },
                success: function (data) {
                    if(data.result==1){
                        alert('Thành công');
                        getBusRoute();
                    }
                }
            })
        }
    </script>
@endsection

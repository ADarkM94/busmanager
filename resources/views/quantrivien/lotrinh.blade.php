@extends('quantrivien.main')
@section('content')
    <div class="content lotrinh row show">
        <div class="col-lg-7" style="position: relative; height: 100%; font-size: 1em; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Lộ trình</h4>
            <div id="busroute">
            </div>
            <a href="javascript:void(0)" onclick="prepareAddLT()" data-toggle="modal" data-target="#addlotrinh" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Thêm Lộ Trình">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="javascript:void(0)" onclick="getBusRoute(1)" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Làm Mới">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
        <div class="col-lg-5" style="position: relative; height: 100%; font-size: 1em; padding: 3em 1em 1em;">
            <h4 style="position: absolute; top: 0; left: 0; width: 100%;">Bảng Các tỉnh</h4>
            <div id="province">
            </div>
            <a href="javascript:void(0)" onclick="prepareAddT()" data-toggle="modal" data-target="#addtinh" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Thêm Tỉnh/Thành Phố">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="javascript:void(0)" onclick="getBusRoute(2)" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Làm Mới">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
        </div>
    </div>
@endsection
@section('excontent')
    <datalist id="diadiem" style="display: none;">
        @foreach($province as $row)
            <option>{{$row["Tên"]}}</option>
        @endforeach
    </datalist>
    <div id="addlotrinh" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Thông Tin Lộ trình</div>
                </div>
                <div class="modal-body">
                    <form name="addbusroute">
                        <input type="hidden" name="employeeID" value="1">
                        <input type="hidden" name="ID" value="">
                        <div class="row">
                            <div class="col-lg-6" style="font-size: 1em; width: 50%">
                                <label>Nơi đi</label>
                                <input type="text" class="form-control" list="diadiem" name="noidi" placeholder="Địa điểm đi">
                            </div>
                            <div class="col-lg-6" style="width: 50%; text-align: left;">
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
                    <button class="btn btn-success" id="btnsubmit" onclick="addLotrinh()">Thêm Lộ Trình</button>
                </div>
            </div>
        </div>
    </div>
    <div id="addtinh" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Thông Tin Tỉnh Thành</div>
                </div>
                <div class="modal-body">
                    <form name="addprovince">
                        <input type="hidden" name="ID" value="">
                        <div class="row">
                            <div class="col-lg-6" style="font-size: 1em; width: 50%">
                                <label>Tên gọi</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên tỉnh thành">
                            </div>
                            <div class="col-lg-6" style="width: 50%; text-align: left;">
                                <label>Mã vùng</label>
                                <input type="text" class="form-control" name="mavung" placeholder="Mã vùng biển số">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button class="btn btn-success" id="btnsubmit1" onclick="addTinh()">Thêm Tỉnh</button>
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
            /*cellDblClick: function (event,ui) {
                window.open( + "/" + ui.rowData["Mã"]);
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
                title: "Tên tỉnh",
                width: 100,
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
                title: "Mã vùng biển số",
                width: 150,
                dataIndx: "Mã_vùng",
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
                    str += '<a title="Edit" id="idEditProvince" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    str += '<a title="Delete" id="idDelProvince" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                    return str;
                },
                postRender: function (ui) {
                    var rowData = ui.rowData,
                        $cell = this.getCell(ui);
                    //add button
                    $cell.find("a#idEditProvince")
                        .unbind("click")
                        .bind("click", function (evt) {
                            document.forms["addprovince"]["name"].value = rowData["Tên"];
                            document.forms["addprovince"]["mavung"].value = rowData["Mã_vùng"];
                            document.forms["addprovince"]["ID"].value = rowData["Mã"];
                            document.getElementById("btnsubmit1").innerHTML="Sửa Thông Tin Tỉnh";
                            $("#addtinh").modal("show");
                        });
                    $cell.find("a#idDelProvince")
                        .unbind("click")
                        .bind("click", function (evt) {
                            if(confirm("Bạn chắc chắn muốn xóa?")){
                                delprovince(rowData["Mã"]);
                            }
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
            var $grid1 = $("#busroute").pqGrid(obj1);
            $grid1.pqGrid("refreshDataAndView");
            obj2.dataModel = {
                data: {!! json_encode($province) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj2.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid2 = $("#province").pqGrid(obj2);
            $grid2.pqGrid("refreshDataAndView");
        });
        function getBusRoute(index) {
            $.ajax({
                type:'GET',
                url:'{{asset("/admin/lotrinh")}}/'+index,
                success:function(data){
                    if (index == 1) {
                        obj1.dataModel = {
                            data: data.msg,
                            location: "local",
                            sorting: "local",
                            sortDir: "down"
                        };
                        obj1.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
                        var $grid1 = $("#busroute").pqGrid(obj1);
                        $grid1.pqGrid("refreshDataAndView");
                    }
                    else if (index == 2) {
                        var diadiem = document.getElementById('diadiem');
                        diadiem.innerHTML = "";
                        for (var i = 0;i<data.msg.length;i++) {
                            diadiem.innerHTML += "<option>"+data.msg[i]["Tên"]+"</option>";
                        }
                        obj2.dataModel = {
                            data: data.msg,
                            location: "local",
                            sorting: "local",
                            sortDir: "down"
                        };
                        obj2.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
                        var $grid2 = $("#province").pqGrid(obj2);
                        $grid2.pqGrid("refreshDataAndView");
                    }
                }
            });
        }
        function prepareAddLT() {
            var id =document.forms["addbusroute"]["employeeID"].value;
            document.forms["addbusroute"].reset();
            document.forms["addbusroute"]["employeeID"].value = id;
            document.forms["addbusroute"]["ID"].value = "";
            document.getElementById("btnsubmit").innerHTML="Thêm Lộ Trình";
        }
        function addLotrinh() {
            var id = document.forms["addbusroute"]["ID"].value;
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
                url: '{{route("addbusroute")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id,
                    employeeID: employeeid,
                    noidi: noidi,
                    noiden: noiden,
                    busstops: busstops
                },
                success: function (data) {
                    if(data.result==1){
                        $("#addlotrinh").modal('hide');
                        alert('Thêm sửa thành công');
                        getBusRoute(1);
                    }
                    else {
                        alert('Thêm sửa thất bại');
                    }
                }
            });
        }
        function delbusroute(id) {
            $.ajax({
                url: '{{route("delbusroute")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id
                },
                success: function (data) {
                    if(data.result==1){
                        alert('Xóa thành công');
                        getBusRoute(1);
                    }
                    else {
                        alert('Xóa thất bại');
                    }
                }
            });
        }
        //Hàm cho phần tỉnh
        function prepareAddT() {
            document.forms["addprovince"].reset();
            document.forms["addprovince"]["ID"].value = "";
            document.getElementById("btnsubmit1").innerHTML="Thêm Tỉnh";
        }
        function addTinh() {
            var id = document.forms["addprovince"]["ID"].value;
            var name = document.forms["addprovince"]["name"].value;
            var mavung = document.forms["addprovince"]["mavung"].value;
            $.ajax({
                url: '{{route("addprovince")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id,
                    name: name,
                    mavung: mavung
                },
                success: function (data) {
                    if(data.result==1){
                        $("#addtinh").modal('hide');
                        alert('Thêm sửa thành công');
                        getBusRoute(2);
                    }
                    else {
                        alert('Thêm sửa thất bại');
                    }
                }
            });
        }
        function delprovince(id) {
            $.ajax({
                url: '{{route("delprovince")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    ID: id
                },
                success: function (data) {
                    if(data.result==1){
                        alert('Xóa thành công');
                        getBusRoute(2);
                    }
                    else {
                        alert('Xóa thất bại');
                    }
                }
            });
        }
    </script>
@endsection

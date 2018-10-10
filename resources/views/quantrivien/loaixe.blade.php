@extends('quantrivien.main')
@section('content')
    <div class="content loaixe show">
        <div class="col-lg-6">
            <div class="col-lg-12">
                <span>Loại xe</span>
                <div id="busmodel">
                </div>
            </div>
            <div class="col-lg-12">
                <span>Thông tin loại xe</span>
                <form name="ttmodel" action="{{route('addbusmodel')}}" method="post" class="">
                    @csrf
                    <input type="hidden" name="employeeID" value="1">
                    <input type="hidden" name="ID" value="">
                    <input type="text" name="name" class="form-control" placeholder="Tên loại xe">
                    <input type="number" min="1" name="row" class="form-control" placeholder="Số hàng">
                    <input type="number" min="1" name="col" class="form-control" placeholder="Số cột">
                    <input type="hidden" name="soghe">
                    <input type="hidden" name="sodo">
                    <input type="hidden" name="noidung">
                    <input type="button" onclick="changemodel()" name="apdung" class="btn btn-success" value="Áp dụng">
                    <input type="submit" onclick="checksubmit(this)" name="submit" class="btn btn-warning" value="Thêm Loại Xe" disabled>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="">
                <div class="sodoxe">
                    <div>Chỉnh sửa sơ đồ loại xe
                        <hr>
                    </div>
                    <div class="col-lg-12" id="mapxe">
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
                </div>
                <div class="row" id="xnsodo">
                    <div class="col-lg-6">
                        <span onclick="fxacnhan()">Xác nhận</span>
                    </div>
                    <div class="col-lg-6">
                        <span onclick="huy()">Hoàn tác</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
        var xacnhan=0;
        var option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[3].classList.add('selected');
        option[3].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/bus-type-hover.png")}}');
        var model = {!!json_encode($model)!!};
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
                columnBorders: false,
                postRenderInterval: -1,
                selectionModel: { type: 'row', mode: 'single' },
                numberCell: { show: false },
                stripeRows: false,
                /*cellDblClick: function (event,ui) {
                }*/
            };
            obj.colModel = [
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
                    title: "Tên Loại",
                    width: 100,
                    dataIndx: "Tên_Loại",
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
                    title: "Số ghế",
                    width: 150,
                    dataIndx: "Số_ghế",
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
                    title: "Số hàng",
                    width: 150,
                    dataIndx: "Số_hàng",
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
                    title: "Số cột",
                    width: 150,
                    dataIndx: "Số_cột",
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
                    title: "Sơ đồ",
                    width: 100,
                    dataIndx: "Sơ_đồ",
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
                        str += '<a title="Edit" id="idEditBusModel" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelBusModel" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditBusModel")
                            .unbind("click")
                            .bind("click", function (evt) {
                                editModel(rowData["Mã"],rowData["Tên_Loại"],rowData["Số_hàng"],rowData["Số_cột"],rowData["Sơ_đồ"]);
                            });
                        $cell.find("a#idDelBusModel")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign("{{url('admin/delloaixe')}}"+"/"+rowData["Mã"]);
                            });
                    }
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($busmodel) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP:5, rPPOptions: [5, 10, 15, 20]};
            var $grid = $("#busmodel").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
        function editModel(id,name,row,col,sodo){
            var ttname = document.forms["ttmodel"]["name"];
            var ttrow = document.forms["ttmodel"]["row"];
            var ttcol = document.forms["ttmodel"]["col"];
            var tensodo = document.forms["ttmodel"]["sodo"];
            var noidungsodo =document.forms["ttmodel"]["noidung"];
            var ttsubmit = document.forms["ttmodel"]["submit"];
            var ttsodo = model[sodo].split('');
            var view = document.getElementById('mapxe');
            var str ="<table style='width: 100%; height: 500px; border-collapse: separate; border-spacing: 5px 5px; '>";
            for (var i = 0; i<row;i++) {
                str+="<tr>"
                for (var j =0; j<col;j++) {
                    if (ttsodo[i*col+j]==1) {
                        str+="<td onclick='change(this)' class='glyphicon glyphicon-check'></td>";
                    }
                    else if (ttsodo[i*col+j]==0) {
                        str+="<td onclick='change(this)' class='glyphicon glyphicon-unchecked'></td>";
                    }
                }
                str+="</tr>";
            }
            str +="</table>";
            document.forms["ttmodel"]["ID"].value = id;
            ttname.value = name;
            ttrow.value = row;
            ttcol.value = col;
            tensodo.value = sodo;
            noidungsodo.value = model[sodo];
            view.innerHTML = str;
            ttsubmit.value = "Lưu Thay Đổi";
            document.forms["ttmodel"]["name"].removeAttribute("readonly");
            document.forms["ttmodel"]["row"].removeAttribute("readonly");
            document.forms["ttmodel"]["col"].removeAttribute("readonly");
            document.forms["ttmodel"]["apdung"].removeAttribute("disabled");
            ttsubmit.setAttribute("disabled","");
            document.getElementById("xnsodo").getElementsByTagName("span")[0].removeAttribute("disabled");
            document.getElementById("xnsodo").getElementsByTagName("span")[1].removeAttribute("disabled");
            xacnhan = 1;
        }
        function change(ev) {
            if(ev.classList.contains('glyphicon-check')) {
                ev.classList.remove('glyphicon-check');
                ev.classList.add('glyphicon-unchecked');
            }
            else {
                ev.classList.remove('glyphicon-unchecked');
                ev.classList.add('glyphicon-check');
            }
        }
        function changemodel() {
            var id = document.forms["ttmodel"]["ID"].value;
            var row = document.forms["ttmodel"]["row"].value;
            var col = document.forms["ttmodel"]["col"].value;
            var name = document.forms["ttmodel"]["name"].value;
            if(row>0&&col>0&&name!=""){
                if(id==""){
                    var filename = Date.now();
                    document.forms["ttmodel"]["sodo"].value = prompt("Nhập tên file muốn lưu sơ đồ xe:",filename);
                }
                var view = document.getElementById('mapxe');
                var str ="<table style='width: 100%; height: 500px; border-collapse: separate; border-spacing: 5px 5px; '>";
                for (var i = 0; i<row;i++) {
                    str+="<tr>"
                    for (var j =0; j<col;j++) {
                        str += "<td onclick='change(this)' class='glyphicon glyphicon-unchecked'></td>";
                    }
                    str+="</tr>";
                }
                str +="</table>";
                view.innerHTML = str;
                document.forms["ttmodel"]["name"].setAttribute("readonly","");
                document.forms["ttmodel"]["row"].setAttribute("readonly","");
                document.forms["ttmodel"]["col"].setAttribute("readonly","");
                document.forms["ttmodel"]["apdung"].setAttribute("disabled","");
                xacnhan = 1;
            }
            else {
                alert("Chưa điền đầy đủ thông tin của loại xe!");
            }
        }
        function fxacnhan() {
            var view = document.getElementById('mapxe');
            var row = document.forms['ttmodel']['row'].value;
            var col =document.forms['ttmodel']['col'].value;
            var str ="";
            var soghe = 0;
            if (xacnhan==0)
                return;
            for (var i = 0;i<row;i++){
                var trow = view.getElementsByTagName('tr')[i];
                for(var j = 0;j<col;j++){
                    var tcol =trow.getElementsByTagName('td')[j];
                    if(tcol.classList.contains('glyphicon-check')) {
                        str+="1";
                        soghe+=1;
                    }
                    else if(tcol.classList.contains('glyphicon-unchecked')) {
                        str+="0";
                    }
                }
            }
            alert(str+str.length+soghe);
            document.forms['ttmodel']['noidung'].value = str;
            document.forms['ttmodel']['soghe'].value = soghe;
            document.forms['ttmodel']['submit'].removeAttribute("disabled");
            xacnhan = 2;
        }
        function huy() {
            location.assign(location.href);
        }
        function checksubmit(ev) {
        }
    </script>
@endsection

@extends('quantrivien.main')
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="content show row">
        <div class="col-lg-3">
            @if(session('alert'))
                {!! session('alert') !!}
            @endif
        </div>
        <form class="col-lg-6" action="{{route('addcustomer')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?></legend>
                <input type="hidden" name="employeeID" value="1">
                @isset($ttchuyenxe)
                    <?php
                    $ttchuyenxe = (array)$ttchuyenxe;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttchuyenxe['Mã']}}">
                @endisset
                <label>Lộ trình</label>
                <input type="hidden" name="idlotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Mã_lộ_trình']:''}}">
                <input type="date" list="lotrinh" class="form-control"  name="lotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Nơi_đi'].'-'.$ttchuyenxe['Nơi_đến']:''}}" placeholder="Ngày sinh">
                <br>
                <label>Tài xế</label>
                <input type="hidden" name="idtaixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Mã_tài_xế']:''}}">
                <input type="text" list="taixe" class="form-control" name="taixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Tài_xế']:''}}" placeholder="Tài xế">
                <br>
                <label>Xe</label>
                <input type="hidden" name="idxe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Mã_xe']:''}}">
                <input type="text" list="taixe" class="form-control" name="xe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Biển_số']:''}}" placeholder="Chọn xe">
                <br>
                <label>Thời gian khởi hành</label>
                <input type="datetime-local" class="form-control"  name="starttime" value="{{isset($ttchuyenxe['Thời_gian_xuất_phát'])? $ttchuyenxe['Thời_gian_xuất_phát']:''}}">
                <br>
                <div id="ticket"></div>
                <div style="text-align: center">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/chuyenxe')}}')" class="btn btn-danger" value="Hủy">
                </div>
            </fieldset>
        </form>
        <div class="col-lg-3"></div>
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
        option[2].classList.add('selected');
        option[2].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/chuyenxe-hover.png")}}');
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
                cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addnhanvien')}}" + "/" + ui.rowData["Mã"]);
                }
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

            obj.dataModel = {
                data: {!! json_encode($ticket) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#ticket").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
    </script>
@endsection

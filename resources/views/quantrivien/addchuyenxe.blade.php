@extends('quantrivien.main')
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="content show row">
        <div class="col-lg-2">
            @if(session('alert'))
                <div class="modal fade" id="alertmessage">
					<div class="modal-dialog" style="width: 400px; margin-top: 200px;">
						<div class="modal-content" style="text-align: center;">
							<div class="modal-header">
								<div class="modal-title">Thông báo</div>
							</div>
							<div class="modal-body alert alert-warning" style="text-align: center; margin-bottom: 0;">
								{{session('alert')}}
							</div>
							<div class="modal-footer" style="text-align: center;">
								<span class="btn btn-success" data-dismiss="modal">OK</span>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function(){
						$('#alertmessage').modal('show');
					});
				</script>
            @endif
        </div>
        <form class="col-lg-8" name="ttchuyenxe" action="{{route('addchuyenxexl')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?></legend>
                <input type="hidden" name="employeeID" value="{{session('admin.id')}}">
                @isset($ttchuyenxe)
                    <?php
                    $ttchuyenxe = (array)$ttchuyenxe;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttchuyenxe['Mã']}}">
                @endisset
				<div class="row" style="padding-left: 1em; padding-right: 1em;">
					<div class="col-lg-6">
					<label>Trạng thái</label>
					<select name="status" class="form-control">
						<option value="0" {{(isset($ttchuyenxe['Trạng_thái'])&&$ttchuyenxe['Trạng_thái']==0)? 'selected':''}}>Waiting</option>
						<option value="1" {{(isset($ttchuyenxe['Trạng_thái'])&&$ttchuyenxe['Trạng_thái']==1)? 'selected':''}}>Running</option>
						<option value="2" {{(isset($ttchuyenxe['Trạng_thái'])&&$ttchuyenxe['Trạng_thái']==2)? 'selected':''}}>Completed</option>
						<option value="3" {{(isset($ttchuyenxe['Trạng_thái'])&&$ttchuyenxe['Trạng_thái']==3)? 'selected':''}}>Locked</option>
					</select>
					</div>
				</div>
				<br>
                <div class="col-lg-6">
                    <label>Mã Lộ trình</label>
                    {{-- <input type="hidden" name="idlotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Mã_lộ_trình']:''}}">--}}
                    <input type="text" list="lotrinh" class="form-control"  name="lotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Mã_lộ_trình']:''}}" placeholder="Lộ trình" required>
                    <br>
                    <label>Mã Tài xế</label>
                    {{-- <input type="hidden" name="idtaixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Mã_tài_xế']:''}}">--}}
                    <input type="text" list="taixe" class="form-control" name="taixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Mã_tài_xế']:''}}" placeholder="Tài xế" required>
                    <br>
                    <label>Mã Xe</label>
                    {{--<input type="hidden" name="idxe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Mã_xe']:''}}">--}}
                    <input type="text" list="xe" class="form-control" name="xe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Mã_xe']:''}}" placeholder="Chọn xe" required>
                    <br>
                </div>
                <div class="col-lg-6">
                    <label>Giờ khởi hành</label>
                    <input type="time" class="form-control"  name="starttime" value="{{isset($ttchuyenxe['Giờ_xuất_phát'])? $ttchuyenxe['Giờ_xuất_phát']:''}}" required>
                    <br>
                    <label>Ngày khởi hành</label>
                    <input type="date" class="form-control"  name="startdate" value="{{isset($ttchuyenxe['Ngày_xuất_phát'])? $ttchuyenxe['Ngày_xuất_phát']:''}}" required>
                    <br>
                    <label>Tiền vé</label>
                    <input type="number" min="0" class="form-control"  name="tien" value="{{isset($ttchuyenxe['Tiền_vé'])? $ttchuyenxe['Tiền_vé']:''}}" required>
                    <br>
                </div>
                <div id="ticket"></div>
                <br>
                <div style="text-align: center; clear: both;">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/chuyenxe')}}')" class="btn btn-danger" value="Hủy">
                </div>
            </fieldset>
        </form>
        <div class="col-lg-2"></div>
    </div>
@endsection
@section('excontent')
    <datalist id="lotrinh">
        @foreach($lotrinhs as $lotrinh)
            <option value="{{$lotrinh['Mã']}}">{{$lotrinh['Nơi_đi']}}-{{$lotrinh['Nơi_đến']}}</option>
        @endforeach
    </datalist>
    <datalist id="taixe">
        @foreach($taixes as $taixe)
            <?php $taixe = (array)$taixe?>
            <option value="{{$taixe['Mã']}}">{{$taixe['Họ_Tên']}}</option>
        @endforeach
    </datalist>
    <datalist id="xe">
        @foreach($xes as $xe)
            <option value="{{$xe['Mã']}}">{{$xe['Biển_số']}}</option>
        @endforeach
    </datalist>
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
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[2].classList.add('selected');
        option[2].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/chuyenxe-hover.png")}}');
    </script>
    @isset($ttchuyenxe)
        <script>
            var obj = {
                width: '100%',
                height: 480,
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
                /* cellDblClick: function (event,ui) {
                 }*/
            };
            obj.colModel = [
                {
                    title: "Action",
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
            ];
            $(function () {
                obj.dataModel = {
                    data: {!! json_encode($ticket) !!},
                    location: "local",
                    sorting: "local",
                    sortDir: "down"
                };
                // obj.pageModel = {type: 'local', rPP: 10, rPPOptions: [10, 20, 30, 50]};
                var $grid = $("#ticket").pqGrid(obj);
                $grid.pqGrid("refreshDataAndView");
            });
            function refresh() {
                var idchuyenxe = "{{isset($ttchuyenxe)? $ttchuyenxe['Mã']:''}}";
                $.ajax({
                    type:'GET',
                    url:'{{asset("/admin/ticket")}}/2/'+idchuyenxe,
                    success:function(data){
                        obj.dataModel = {
                            data: data.msg,
                            location: "local",
                            sorting: "local",
                            sortDir: "down"
                        };
                        // obj.pageModel = {type: 'local', rPP: 10, rPPOptions: [10, 20, 30, 50]};
                        var $grid = $("#ticket").pqGrid(obj);
                        $grid.pqGrid("refreshDataAndView");
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
                            refresh();
                        }
                        else {
                            alert('Sửa thất bại');
                        }
                    }
                });
            }
        </script>
    @endisset
@endsection

@extends('quantrivien.main')
@section('content')
    <div class="content khachhang show">
        <h4>Thông tin khách hàng</h4>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form name="ttkhachhang">
                <div class="row form-group">
                    <div class="col-lg-6">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Tên']:''}}" readonly="">
                        <br>
                        <label>Giới tính</label>
                        <input type="text" name="gender" class="form-control" value="{{isset($ttkhachhang)? ($ttkhachhang['Giới tính']==0? 'Không xác định':($ttkhachhang['Giới tính']==1? 'Nam':'Nữ')):''}}" readonly="">
                        <br>
                        <label>Ngày sinh</label>
                        <input type="date" name="brtday" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Ngày_sinh']:''}}" readonly="">
                        <br>
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Địa chỉ']:''}}" readonly="">
                    </div>
                    <div class="col-lg-6">
                        <label>Nickname</label>
                        <input type="text" name="nickname" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Nickname']:''}}" readonly="">
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Email']:''}}" readonly="">
                        <br>
                        <label>Số điện thoại</label>
                        <input type="tel" name="phone" class="form-control" value="{{isset($ttkhachhang)? $ttkhachhang['Sđt']:''}}" readonly="">
                    </div>
                </div>
                <div class="row form-group">
                    <h4>Các chuyến xe đã đi</h4>
                    <div id="chuyendi" style="height: 200px;">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>
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
                /*cellDblClick: function (event,ui) {
                }*/
            };
            obj.colModel = [
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
                }
            ];
            obj.dataModel = {
                data: {!! json_encode($ttchuyendi) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 5, rPPOptions: [5, 10, 15, 20]};
            var $grid = $("#chuyendi").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
    </script>
@endsection

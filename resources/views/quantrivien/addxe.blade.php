@extends('quantrivien.main')
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="content show row" id="addxe">
        <div class="col-lg-3">
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
        <form name="ttxe" class="col-lg-6" action="{{route('addbus')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttxe)? 'Sửa Thông Tin Xe':'Thêm Xe';?></legend>
                @isset($ttxe)
                    <?php
                    $ttxe = (array)$ttxe;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttxe['Mã']}}">
                @endisset
                <label>Biển số</label>
                <input type="text" class="form-control" name="bienso" value="{{isset($ttxe['Biển_số'])? $ttxe['Biển_số']:''}}" placeholder="Biển số xe">
                <br>
                <label>Loại xe</label>
                <select class="form-control" name="idtypebus">
                    @foreach($bustypes as $bustype)
                        <?php $bustype = (array)$bustype;?>
                        <option value="{{$bustype['Mã']}}" {{isset($ttxe['Mã_loại_xe'])? ($bustype['Mã']==$ttxe['Mã_loại_xe']? 'selected':''):''}}>{{$bustype['Tên_Loại']}}-{{$bustype['Loại_ghế']==0? 'Ghế_ngồi':'Giường_nằm'}}</option>
                    @endforeach
                </select>
                <br>
                <label>Lần bảo trì gần nhất</label>
                <br>
                <input type="date" class="form-control" name="baotrigannhat" value="{{isset($ttxe['Ngày_bảo_trì_gần_nhất'])? $ttxe['Ngày_bảo_trì_gần_nhất']:''}}">
                <br>
                <label>Lần bảo trì tiếp theo</label>
                <br>
                <input type="date" class="form-control" name="baotritieptheo" value="{{isset($ttxe['Ngày_bảo_trì_tiếp_theo'])? $ttxe['Ngày_bảo_trì_tiếp_theo']:''}}">
                <br>
                <div style="text-align: center">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttxe)? 'Sửa Thông Tin':'Thêm Xe';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/xe')}}')" class="btn btn-danger" value="Hủy">
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
        option[7].classList.add('selected');
        option[7].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/bus-hover.png")}}');
    </script>
@endsection

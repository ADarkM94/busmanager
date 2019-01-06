<!DOCTYPE html>
<html>
<head>
	<title>Bảng giải thuật gợi ý</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<style>
    table {
        border: 1px solid black;
		width: 100%;
    }
    th,td {
        border: 1px solid black;
		padding: 5px;
    }
</style>
<div class="container-fluid">
<h2 class="alert alert-success">Demo Chức Năng Gợi Ý Chổ Ngỗi</h2>
<form action="{{route('ticketsuggestion')}}" class="row" method="post">
	@csrf
	<div class="col-lg-4"></div>
	<div class="form-group col-lg-4">
		<label>Mã chuyến xe:</label>
		<input type="text" class="form-control" name="idchuyenxe" placeholder="Mã chuyến xe">
	</div>
	<div class="col-lg-4"></div>
	<div class="col-lg-12"></div>
	<div class="col-lg-4"></div>
	<div class="form-group col-lg-4">
		<label>Mã khách hàng:</label>
		<input type="text" class="form-control" name="idkhachhang" placeholder="Mã khách hàng">
	</div>
	<div class="col-lg-4"></div>
	<div class="col-lg-12"></div>
	<div class="col-lg-4"></div>
	<input type="submit" class="btn btn-success col-lg-4" value="Gửi">
	<div class="col-lg-4"></div>
</form>
@isset($matrix)
    <table>
		<caption>Ma trận user-item ban đầu</caption>
		<tr>
			<th></th>
			@foreach($vitrighe as $row)
                <th>{{$row->Vị_trí_ghế}}</th>
			@endforeach
		</tr>
        @foreach($matrix as $key => $value)
            <tr>
                <th>{{$key}}</th>
                @for($i=0;$i<count($value);$i++)
                    <td>{{$value[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </table>
@endisset
@isset($normmatrix)
    <table>
		<caption>Ma trận user-item chuẩn hóa ban đầu</caption>
		<tr>
			<th></th>
			@foreach($vitrighe as $row)
                <th>{{$row->Vị_trí_ghế}}</th>
			@endforeach
		</tr>
        @foreach($normmatrix as $key => $value)
            <tr>
                <th>{{$key}}</th>
                @for($i=0;$i<count($value);$i++)
                    <td>{{$value[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </table>
@endisset
@isset($similarmatrix)
    <table>
		<caption>Ma trận user tương tự</caption>
		<tr>
			<th></th>
			@foreach($similarmatrix as $key => $value)
                <th>{{$key}}</th>
			@endforeach
		</tr>
        @foreach($similarmatrix as $key => $value)
            <tr>
                <th>{{$key}}</th>
                @for($i=0;$i<count($value);$i++)
                    <td>{{$value[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </table>
@endisset
@isset($normmatrixFull)
    <table>
		<caption>Ma trận chuẩn hóa đầy đủ</caption>
		<tr>
			<th></th>
			@foreach($vitrighe as $row)
                <th>{{$row->Vị_trí_ghế}}</th>
			@endforeach
		</tr>
        @foreach($normmatrixFull as $key => $value)
            <tr>
                <th>{{$key}}</th>
                @for($i=0;$i<count($value);$i++)
                    <td>{{$value[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </table>
@endisset
@isset($matrixFinal)
    <table>
		<caption>Ma trận user-item đầy đủ</caption>
		<tr>
			<th></th>
			@foreach($vitrighe as $row)
                <th>{{$row->Vị_trí_ghế}}</th>
			@endforeach
		</tr>
        @foreach($matrixFinal as $key => $value)
            <tr>
                <th>{{$key}}</th>
                @for($i=0;$i<count($value);$i++)
                    <td>{{$value[$i]}}</td>
                @endfor
            </tr>
        @endforeach
    </table>
@endisset
@isset($kq)
    <table>
		<caption>Kết quả</caption>
		<tr>
			<th>Mã vé</th>
			<th>Trạng thái</th>
			<th>Vị trí</th>
			<th>Tần số</th>
		</tr>
        @foreach($kq as $row)
            <tr>
                <td>{{$row->Mã}}</td>
                <td>{{$row->Trạng_thái}}</td>
                <td>{{$row->Vị_trí_ghế}}</td>
                <td>{{$row->tanso}}</td>
            </tr>
        @endforeach
    </table>
@endisset
</div>
</body>
</html>

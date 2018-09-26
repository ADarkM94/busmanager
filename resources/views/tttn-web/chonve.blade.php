@extends('tttn-web.main')
@section('content')
    <div class="chonvemain">
        <div class="chonveleft">
            <h3>Thông tin vé</h3>
            <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>Quảng Ngãi</a></p><br>
            <p><i class="fa fa-bus"></i> Nơi đến: <a>Hồ Chí Minh</a></p> <br>
            <p><span class="glyphicon glyphicon-time"></span> Giờ khởi hành: 1:30 16-9</p><br>
            <p><span class="glyphicon glyphicon-bed"></span> Loại xe: Giường nằm</p><br>
            <p><i class="fa fa-balance-scale"></i> Giá vé : 200.000đ</p><br>
            <p><i class="fa fa-address-card-o"></i> Vé đang chọn: D1</p><br>
            <button type="button" class="btn btn-success">Giữ chổ</button>
            <button type="button" class="btn btn-success">Thanh toán</button>
        </div>
        <div class="chonveright">
            <h3>Sơ đồ xe</h3>
            <ul>
                <li><i class="loaigheban"></i> &nbsp;Ghế đã bán</li>
                <li><i class="loaighetrong"></i> &nbsp;Ghế còn trống</li>
                <li><i class="loaighechon"></i> &nbsp;Ghế đang chọn</li>
            </ul>
            <br>
            <table style="margin-top: 2em;">
                <tr>
                    <td class="ghetaixe" title="Ghế tài xế"></td>
                    <td class="ghetrong"></td>
                    <td class="ghetrong"></td>
                    <td class="ghetrong"></td>
                    <td class="ghetrong"></td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">A1</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">B1</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghecontrong">
                        <div class="content">C1</div>
                    </td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">A2</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghecontrong">
                        <div class="content">B2</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">C2</div>
                    </td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">A3</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghecontrong">
                        <div class="content">B3</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">C3</div>
                    </td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">A4</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">B4</div>
                    </td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua">
                        <div class="content">C4</div>
                    </td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">A5</div></td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">B5</div></td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">C5</div></td>
                </tr>
                <tr>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">A6</div></td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">B6</div></td>
                    <td class="ghetrong"></td>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">C6</div></td>
                </tr>
                <tr>
                    <td class="ghedangchon"><div class="content">D1</div></td>
                    <td class="ghecontrong"><div class="content">D2</div></td>
                    <td class="ghecontrong"><div class="content">D3</div></td>
                    <td class="ghecontrong"><div class="content">D4</div></td>
                    <td class="ghe" title="khách hàng đã mua"><div class="content">D5</div></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

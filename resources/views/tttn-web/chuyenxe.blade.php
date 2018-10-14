@extends('tttn-web.main')
@section('title')
    Chuyến xe
@endsection
@section('content')
    <div class="buoc">
        <ul>
            <li>Tìm Chuyến</li>
            <li style="background: #f57812; color: #FFF;" class="stay">Chọn Chuyến</li>
            <li>Chi Tiết Vé</li>
        </ul>
    </div>
    <div class="chuyenxemain">
        <table>
            <tr>
                <th>Tuyến</th>
                <th>Giờ Xuất Bến</th>
                <th>Giá Vé</th>
                <th>Còn Trống</th>
                <th>Loại Xe</th>
                <th>Đặt Mua</th>
            </tr>
            <tr>
                <td><span>Quảng Ngãi - Hồ Chí Minh</span></td>
                <td><span>13:00 27/09/2018</span></td>
                <td>300.000đ</td>
                <td>20</td>
                <td>Giường Nằm</td>
                <td><div class="chuyenxetim">
                        <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                        <button type="button" class="btn"><a href="chonve">02 ngày 12:12:11</a></button>
                    </div></td>
            </tr>
            <tr>
                <td><span>Quảng Ngãi - Hồ Chí Minh</span></td>
                <td><span>13:00 27/09/2018</span></td>
                <td>300.000đ</td>
                <td>20</td>
                <td>Giường Nằm</td>
                <td><div class="chuyenxetim">
                        <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                        <button type="button" class="btn"><a href="chonve">02 ngày 12:12:11</a></button>
                    </div></td>
            </tr>
            <tr>
                <td><span>Quảng Ngãi - Hồ Chí Minh</span></td>
                <td><span>13:00 27/09/2018</span></td>
                <td>300.000đ</td>
                <td>20</td>
                <td>Giường Nằm</td>
                <td><div class="chuyenxetim">
                        <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                        <button type="button" class="btn"><a href="chonve">02 ngày 12:12:11</a></button>
                    </div></td>
            </tr>
            <tr>
                <td><span>Quảng Ngãi - Hồ Chí Minh</span></td>
                <td><span>13:00 27/09/2018</span></td>
                <td>300.000đ</td>
                <td>20</td>
                <td>Giường Nằm</td>
                <td><div class="chuyenxetim">
                        <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                        <button type="button" class="btn"><a href="chonve">02 ngày 12:12:11</a></button>
                    </div></td>
            </tr>
        </table>
    </div>
@endsection

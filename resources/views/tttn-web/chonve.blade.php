@extends('tttn-web.main')
@section('title')
    Chọn vé
@endsection
@section('content')
    <div class="buoc">
        <ul>
            <li>Tìm Chuyến</li>
            <li>Chọn Vé</li>
            <li style="background: #f57812; color: #FFF;" class="stay">Chi Tiếc vé</li>
        </ul>
    </div>
    <div class="chonvemain">
        <div class="chonveleft">
            @foreach($chonve as $t)
            <h3>Thông tin vé</h3>
            <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$t->Nơi_đi}}</a></p><br>
            <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$t->Nơi_đến}}</a></p> <br>
            <p><span class="glyphicon glyphicon-time"></span> Thời gian khởi hành: {{$t->Ngày_xuất_phát}} : {{$t->Giờ_xuất_phát}}</p><br>
            <p><span class="glyphicon glyphicon-bed"></span> {{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}} </p><br>
            <p><i class="fa fa-balance-scale"></i> Giá vé : {{$t->Tiền_vé/1000}}.000 VNĐ</p><br>
            <p><i class="fa fa-address-card-o"></i> Vé đang chọn: </p><br>
            <button type="button" style="background: #f57812; border: none;" class="btn btn-success chondatve"  data-id={{$id}}>Đặt vé</button>
        </div>
         @endforeach
        <div class="chonveright">
            @if($sodo[0]->Loại_ghế == 1)
            <div class="tengiuong"><h3>Sơ đồ xe</h3></div>
            <div class="chuygiuong">
                <ul>
                <li><i class="loaighetrong"></i> &nbsp;Còn trống</li>
                <li><i class="loaighechon"></i> &nbsp;Đang chọn</li>
                <li><i class="loaigheban"></i> &nbsp;Đã bán</li>
                <li><i class="loaighecochon"></i> &nbsp;Có Người Chọn</li>
                <li><button class="dexuat" title="Đề xuất vị trí">Đề xuất</button></li>
            </ul>
            </div>
                <?php  $sd = $sodo[0]->Sơ_đồ; $dem=0; ?>
                 <div class="sodogiuong">
                 <table class="bangve tangduoi">
                      <td class="giuongtaixe" title="Ghế tài xế">
                       <!--  <img src="../images/ghetaixe2.png"> -->
                     </td>
                    @for($i=0;$i<7;$i++)
                    <tr>
                       @for($j=0;$j<5;$j++)
                            @if($i==0)
								@break
                            @elseif($sd[$i * 5 + $j]==1)
                                @if($ve[$dem]->Trạng_thái == 1)
                                <td class="giuong" title="Giường đã bán cho khách"><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái ==0)
                                <td class="giuongcontrong" title="Ghế trống" data-ma={{$ve[$dem]->Mã}}>
                                    <div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái == 2)
                                    @if($ve[$dem]->Mã_khách_hàng == Session::get('makh'))
                                        <td class="giuongdangchon" title="Ghế Đang Chọn" data-ma={{$ve[$dem]->Mã}}></div><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @else
                                         <td class="giuongcochon" title="Đã Có Người Chọn" data-ma={{$ve[$dem]->Mã}}></div><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @endif
                                @endif
                                  <?php  $dem++; ?>
                            @else
                                <td class="giuongtrong"></td>
                            @endif
                       @endfor
                    </tr>
                    @endfor
                </table>
                <table class="bangve tangtren">
                    <td class="giuongtaixe" title="Ghế tài xế">
                       <!--  <img src="../images/ghetaixe2.png"> -->
                    </td>
                    @for($i=7;$i<13;$i++)
                    <tr>
                       @for($j=0;$j<5;$j++)
                            @if($i ==0)

                            @elseif($sd[$i * 5 + $j]==1)
                                @if($ve[$dem]->Trạng_thái == 1)
                                <td class="giuong" title="Giường đã bán cho khách"></div><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái ==0)
                                <td class="giuongcontrong" title="Ghế trống" data-ma={{$ve[$dem]->Mã}}>
                                    <div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái == 2)
                                    @if($ve[$dem]->Mã_khách_hàng == Session::get('makh'))
                                        <td class="giuongdangchon" title="Ghế Đang Chọn" data-ma={{$ve[$dem]->Mã}}></div><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @else
                                         <td class="giuongcochon" title="Đã Có Người Chọn" data-ma={{$ve[$dem]->Mã}}></div><div class="contentgiuong">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @endif
                                @endif
                                  <?php  $dem++; ?>
                            @else
                                <td class="giuongtrong"></td>
                            @endif
                       @endfor
                    </tr>
                    @endfor
            </table>
             </div>
              <div class="tang">
                <button class="duoi">Tầng Dưới</button>
                <button class="tren">Tầng Trên</button>
            </div>
               @else
                <div class="tengiuong"><h3>Sơ đồ xe</h3></div>
                <div class="chuygiuong">
                    <ul>
                    <li><i class="loaighetrong"></i> &nbsp;Còn trống</li>
                    <li><i class="loaighechon"></i> &nbsp;Đang chọn</li>
                    <li><i class="loaigheban"></i> &nbsp;Đã bán</li>
                    <li><i class="loaighecochon"></i> &nbsp;Có Người Chọn</li>
                    <li><button class="dexuat" title="Đề xuất vị trí">Đề xuất</button></li>
                </ul>
                </div>
               <div class="sodoghe">
               <table class="bangve">
                    <?php  $sd = $sodo[0]->Sơ_đồ; $dem=0; ?>
                    @for($i=0;$i<12;$i++)
                    <tr>
                        @for($j=0;$j<6;$j++)
                            @if($sd[$i * 6 + $j]==1 && ($i * 6 + $j)==0)
                                <td class="ghetaixe" title="Ghế tài xế">
                                  <img src="../images/ghetaixe2.png">
                                </td>
                            @elseif($sd[$i * 6 + $j] == 1)
                                @if($ve[$dem]->Trạng_thái == 1)
                                <td class="ghe" title="Ghế đã bán cho khách">
                                    <img src="../images/ghe.png">
                                    <div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái ==0)
                                    <td class="ghecontrong" title="Ghế trống" data-ma={{$ve[$dem]->Mã}}><img src="../images/ghe.png">
                                        <div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái == 2)
                                    @if($ve[$dem]->Mã_khách_hàng == Session::get('makh'))
                                        <td class="ghedangchon" title="Ghế Đang Chọn" data-ma={{$ve[$dem]->Mã}}><img src="../images/ghe.png"><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @else
                                         <td class="ghecochon" title="Đã Có Người Chọn" data-ma={{$ve[$dem]->Mã}}><img src="../images/ghe.png"><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>

                                    @endif
                                @endif
                                <?php $dem++; ?>
                            @else
                                <td class="ghetrong"></td>
                            @endif
                        @endfor
                    </tr>
                    @endfor
               @endif
            </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        mang=[];
        $(document).ready(function(){
         $(".bangve").delegate(".ghecontrong","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                makh = {{Session::get('makh')}};
                 bien.addClass("ghedangchon");
                 bien.removeClass("ghecontrong");
                 mang.push(ma);
                $.ajax({
                    url: '{{route("xulydatve")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                        MAKH: makh
                    },
                    success: function (data) {
                       if(data.kq == 0){
                        bien.addClass("ghecontrong");
                        bien.removeClass("ghedangchon");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                       }
                       else if(data.kq==1){
                        bien.addClass("ghe");
                        bien.removeClass("ghecontrong");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                        alert("Xin lổi - Ghế này đã có người mua !")
                       }
                       else if(data.kq == 2){
                        bien.addClass("ghecochon");
                        bien.removeClass("ghecontrong");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                        alert("Xin lổi - Ghế này đã có người chọn !")
                       }
                    }
             });
            });
          $(".bangve").delegate(".ghedangchon","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                $.ajax({
                    url: '{{route("xulydatve2")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                    },
                    success: function (data) {
                       if(data.kq == 1){
                        bien.addClass("ghecontrong");
                        bien.removeClass("ghedangchon");
                       for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                       }
                    }
             });
        });
                $(".bangve").delegate(".giuongcontrong","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                makh = {{Session::get('makh')}};
                        bien.addClass("giuongdangchon");
                        bien.removeClass("giuongcontrong");
                        mang.push(ma);
                $.ajax({
                    url: '{{route("xulydatve")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                        MAKH: makh
                    },
                    success: function (data) {
                      if(data.kq==0){
                        bien.addClass("giuongcontrong");
                        bien.removeClass("giuongdangchon");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                      }
                       else if(data.kq==1){
                        bien.addClass("giuong");
                        bien.removeClass("giuongdangchon");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                        alert("Xin lổi - Ghế này đã có người mua !")
                       }
                       else if(data.kq == 2){
                        bien.addClass("giuongcochon");
                        bien.removeClass("giuongdangchon");
                        for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                        alert("Xin lổi - Ghế này đã có người chọn !")
                       }
                    }
             });
            });
               $(".bangve").delegate(".giuongdangchon","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                $.ajax({
                    url: '{{route("xulydatve2")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                    },
                    success: function (data) {
                       if(data.kq == 1){
                        bien.addClass("giuongcontrong");
                        bien.removeClass("giuongdangchon");
                       for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                       }
                    }
             });
        });
               $(".chondatve").click(function(){
                    id = $(this).attr("data-id");
                    makh ={{Session::get('makh')}};
                    dodai = mang.length;
                    $.ajax({
                        url: '{{route("chondatve")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        ID: id,
                        MANG:mang,
                        MAKH:makh,
                        DODAI:dodai
                    },
                    success: function (data) {
                       location.assign("{{asset('thongtinve')}}/"+id+"/"+makh);
                    }
                    });
               });
               $(".tren").click(function(){
                    $(".tren").css({"background":"#f57812","color":"#FFF"});
                    $(".duoi").css({"background":"#CCC","color":"#000"});
                    $(".tangtren").show();
                    $(".tangduoi").hide();
               });
               $(".duoi").click(function(){
                $(".duoi").css({"background":"#f57812","color":"#FFF"});
                $(".tren").css({"background":"#CCC","color":"#000"});
                $(".tangduoi").show();
                $(".tangtren").hide();
               });
               $(".dexuat").click(function () {
                   makh = '{{session('makh')}}';
                   machuyenxe = '{{$chonve[0]->Mã}}';
                  $.ajax({
                      url: '{{route('ticketsuggestion')}}',
                      data: {
                          _token: '{{csrf_token()}}',
                          idkhachhang: makh,
                          idchuyenxe: machuyenxe
                      },
                      type: 'post',
                      success: function (data) {
                          alert('Trang web đề nghị cho bạn những ghế sau:\n'+data.kq[0].Vị_trí_ghế);
                      }
                  }) ;
               });
});
    </script>
@endsection

@extends('tttn-web.main')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="main">
      <!--  Slide -->
         <div class="mainleft">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <?php $j =0; ?>
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  @foreach($slide as $u)
                    @if($j !=0)
                      <li data-target="#myCarousel" data-slide-to="{{$j}}"></li>
                      <?php $j = $j+1; ?>
                    @else
                      <?php $j = $j+1; ?>
                    @endif
                  @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="height: 400px;">
                  <div class="item active">
                    <img src="upload/{{$slide[0]->image}}"  style="width:100%; height: 400px;">
                    
                  </div>
                  <?php $i =0; ?>
                  @foreach($slide as $u)
                    @if($i !=0)
                      <div class="item">
                        <img src="upload/{{$u->image}}"  style="width:100%; height: 400px;">
                      </div>
                    @else
                      <?php $i =1; ?>
                    @endif
                  @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        <!-- Kết slide -->
        <!-- Phần tìm vé trang chủ -->
            <div class="mainright">
                <div class="timchuyendi"><h4>ĐẶT VÉ TRỰC TUYẾN</h4></div>
                <!-- Form tìm vé -->
                <form name="timve" action="{{route('chuyenxe')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- Chọn nơi đi  -->
                      <div class="diadiem">
                          <label>Chọn Nơi Khởi Hành: </label>
                          <div class="input-group" style="box-shadow: 0 3px #F3AD45;">
                               <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                               <select name="Noidi">
                                @foreach($tinh as $t)
                                <option>{{$t->Tên}}</option>
                                 @endforeach
                              </select>    
                          </div>
                      </div>
                    <!-- Chọn nơi đến -->
                      <div class="diadiem">
                          <label>Chọn Nơi Đến </label>
                          <div class="input-group" style="box-shadow: 0 3px #F3AD45;">
                               <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                                <select name="Noiden">
                                  @foreach($tinh as $t)
                                  <option>{{$t->Tên}}</option>
                                   @endforeach
                              </select>
                          </div>
                      </div>
                    <!-- Chọn ngày đi -->
                    <div class="ngaydi">
                        <label>Chọn ngày đi: </label>
                            <div class="form-group" style="box-shadow: 0 3px #F3AD45;">
                                <div class='input-group date'>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" style="color: #f57812;"></span>
                                    </span>
                                    <input type='date' class="form-control" name="Ngaydi" id="txtdate" style="padding-left: 0" />
                                </div>
                             </div>
                        <!-- Button tìm vé  -->
                        <div class="tim">
                            <i class="fa fa-ticket icon-flat bg-btn-actived"></i>
                            <button type="button" class="btn" onclick="document.forms['timve'].submit();"><a href="javascript:void(0)" >Tìm vé</a></button>
                        </div>
                    </div>
                  </form>
                  <!-- Kết form tìm vé -->
            </div>
          <div style="clear: left;"></div>
        <!-- Kết phần tìm vé ở trang chủ -->
        
        <!-- Phần tin tức -->
            <div class="tintuc">
                <div class="tentintuc"><h3>Tin Tức Nổi Bật</h3></div>
                <ul>
                  @foreach($tintuc as $y)
                    <li>
                        <?php  $id = $y->news_id; ?>
                        <img src="upload/{{$y->image}}">
                        
                        <a href="{{asset("showtintuc/{$id}")}}"><strong>{{$y->title}}</strong></a>
                    </li>
                    @endforeach
                </ul>
                <div style="clear: left;"></div>
                <div class="tintucbutton">
                    <button class="btn"><a href="{{asset('/tintuc')}}">Xem Toàn Bộ</a></button>
                </div>
            </div>
            <div style="clear: left;"></div>
        <!-- Kết phần tin tức -->
        <!-- Dịch vụ nổi bật -->
            <div class="dichvu">
                <h4>" Hãy đến với chúng tôi "</h4>
                <h2>Để Nhận Dịch Vụ Tốt Nhất !</h2>
               <div class="dv">
                   <img  src="images/free_wifi.png" />
                   <br>
                   <strong>Wifi Miễn Phí Mọi Nơi !</strong>
               </div>
               <div class="dv">
                   <img  src="images/dien.png" />
                   <br>
                   <strong>Ổ Cắm Theo Từng Chổ Ngồi !</strong>
               </div>
               <div class="dv">
                   <img  src="images/chongoi.png" />
                   <br>
                   <strong>Chổ Ngồi/Nằm Thỏa mái !</strong>
               </div>
            </div>
         <!-- Kết phần dịch vụ nổi bật -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
         /*Xử lý input date của chọn ngày đi*/
        function chonngay(){
            var d = new Date();
            var ngay = d.getDate()<10? ('0'+d.getDate()):d.getDate();
            var thang = (d.getMonth() + 1) <10? ('0'+d.getMonth()+1):d.getMonth()+1;
            var nam = d.getFullYear();
            document.getElementById("txtdate").min=nam+"-"+thang+"-"+ngay;
            document.getElementById("txtdate").value= nam+"-"+thang+"-"+ngay;
        }
        chonngay();
    </script>
@endsection

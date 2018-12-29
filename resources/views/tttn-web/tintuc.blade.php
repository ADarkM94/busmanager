@extends('tttn-web.main')
@section('title')
    Tin tức
@endsection
@section('content')
   <!-- Trang tin tức --> 
    <div class="maintintuc">
        <div class="trangtintuc">
            <div class="trangtentintuc"><h2>Tin Tức</h2></div>
            <ul>
                <ul>
              @foreach($tintuc as $y)
                <li onclick="location.href='{{url("showtintuc")}}/{{$y->news_id}}';" >     
                        <img src="upload/{{$y->image}}">
                        <a><strong>{{$y->title}}</strong></a>
                    </li>
                @endforeach
             </ul>
            </ul>
        </div>
        <div style="clear: left;"></div>
          <!-- Phân trang --> 
        <ul class="pager">
           {!! $tintuc->links() !!}
        </ul>
    </div>
@endsection

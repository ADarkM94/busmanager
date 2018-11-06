<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketBookingManager extends Controller
{
    //
	/* public function searchtinh(Request $request)
	{
		$txtsearch = strtolower($request->txtsearch);
		$txtsearch = FunctionBase::convertAlias($txtsearch);
		if($txtsearch != null)
		{
			$results = DB::select(DB::raw("SELECT Tên FROM tinh WHERE BINARY LOWER(Tên_không_dấu) LIKE '%{$txtsearch}%'"));
			return response()->json(['kq' => 1,'data' => $results]);
		}
		return response()->json(['data' => 0]);
	} */
	public function trangdatve()
	{
		$diadiem = DB::table('tinh')->select('Tên','Tên_không_dấu')->get();
		return view('quanlydatve.datve',['diadiem' => $diadiem]);
	}
	public function searchroute(Request $request)
	{
		$noidi = $request->noidi;
		$noiden = $request->noiden;
		$ngaydi = $request->ngaydi;
		$loaighe = $request->loaighe;
		$chuyenxe = DB::table('chuyen_xe')->join('lo_trinh','chuyen_xe.Mã_lộ_trình','=','lo_trinh.Mã')->join('xe','chuyen_xe.Mã_xe','=','xe.Mã')->join('bus_model','xe.Mã_loại_xe','=','bus_model.Mã')->where('lo_trinh.Nơi_đi','=',$noidi)->where('lo_trinh.Nơi_đến','=',$noiden)->where('chuyen_xe.Ngày_xuất_phát','=',$ngaydi)->where('bus_model.Loại_ghế','=',$loaighe)->select('chuyen_xe.Mã','lo_trinh.Nơi_đi','lo_trinh.Nơi_đến','chuyen_xe.Ngày_xuất_phát','chuyen_xe.Giờ_xuất_phát','lo_trinh.Thời_gian_đi_dự_kiến','bus_model.Loại_ghế')->get();
		foreach($chuyenxe as $key => $value)
		{
			$thoigiandi = strtotime($chuyenxe[$key]->Ngày_xuất_phát.' '.$chuyenxe[$key]->Giờ_xuất_phát);
			$ngayden = date('d-m-Y',$thoigiandi + $chuyenxe[$key]->Thời_gian_đi_dự_kiến);
			$gioden = date('H:i:s',$thoigiandi + $chuyenxe[$key]->Thời_gian_đi_dự_kiến);
			$chuyenxe[$key]->Ngày_xuất_phát = date('d-m-Y',strtotime($chuyenxe[$key]->Ngày_xuất_phát));
			$chuyenxe[$key]->Ngày_đến = $ngayden;
			$chuyenxe[$key]->Giờ_đến = $gioden;
		}
		/* sleep(11); */
		return response()->json(['kq' => 1,'data' => $chuyenxe]);
	}
}

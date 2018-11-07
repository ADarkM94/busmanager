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
		$chuyenxe = DB::table('chuyen_xe')->join('lo_trinh','chuyen_xe.Mã_lộ_trình','=','lo_trinh.Mã')->join('xe','chuyen_xe.Mã_xe','=','xe.Mã')->join('bus_model','xe.Mã_loại_xe','=','bus_model.Mã')->where('lo_trinh.Nơi_đi','=',$noidi)->where('lo_trinh.Nơi_đến','=',$noiden)->where('chuyen_xe.Ngày_xuất_phát','=',$ngaydi)->where('bus_model.Loại_ghế','=',$loaighe)->select('chuyen_xe.Mã','lo_trinh.Nơi_đi','lo_trinh.Nơi_đến','chuyen_xe.Ngày_xuất_phát','chuyen_xe.Giờ_xuất_phát','lo_trinh.Thời_gian_đi_dự_kiến','bus_model.Loại_ghế','bus_model.Số_hàng','bus_model.Số_cột','bus_model.Sơ_đồ')->get();
		foreach($chuyenxe as $key => $value)
		{
			$thoigiandi = strtotime($chuyenxe[$key]->Ngày_xuất_phát.' '.$chuyenxe[$key]->Giờ_xuất_phát);
			$ngayden = date('d-m-Y',$thoigiandi + $chuyenxe[$key]->Thời_gian_đi_dự_kiến);
			$gioden = date('H:i:s',$thoigiandi + $chuyenxe[$key]->Thời_gian_đi_dự_kiến);
			$chuyenxe[$key]->Ngày_xuất_phát = date('d-m-Y',strtotime($chuyenxe[$key]->Ngày_xuất_phát));
			$chuyenxe[$key]->Ngày_đến = $ngayden;
			$chuyenxe[$key]->Giờ_đến = $gioden;
		}
		return response()->json(['kq' => 1,'data' => $chuyenxe]);
	}
	// public function ticketinfo(/*Request $request*/$idve)
	// {
		// $idve = $request->idve; //Gửi lên idve
		// $ttve = DB::table('ve')->join('chuyen_xe','ve.Mã_chuyến_xe','=','chuyen_xe.Mã')->join('lo_trinh','chuyen_xe.Mã_lộ_trình','=','lo_trinh.Mã')->leftJoin('customer','ve.Mã_khách_hàng','=','customer.Mã')->where('ve.Mã','=',$idve)->select('ve.Mã','customer.Tên','customer.Email','customer.Sđt','lo_trinh.Nơi_đi','lo_trinh.Nơi_đến','chuyen_xe.Giờ_xuất_phát','chuyen_xe.Ngày_xuất_phát','ve.Vị_trí_ghế','chuyen_xe.Tiền_vé')->get();
		// if(count($ttve) == 0)
		// {
			// return response()->json(['kq' => 0]);
		// }
		// else
		// {
			// $ttve = $ttve[0];
			// return response()->json(['kq' => 1,'data' => $ttve]);
		// }
	// } 
	// public function checkphone(Request $request) //Hàm kiểm tra Sđt điện thoại đã đăng ký chưa, nếu đã đăng ký thì đăng ký vé luôn còn không thì chuyển qua form đăng ký mới
	// {
		// $phone = $request->phone; //Gửi lên phone
		// $idve = $request->idve; //Gửi lên idve
		// $ttkh = DB::table('khachhang')->where('Sđt','=',$phone)->get();
		// if(count($ttkh) != 0)
		// {
			// $updated_at = date('Y-m-d h-i-s');
			// if(DB::update("UPDATE `ve` SET `Mã_khách_hàng` = ?, `Trạng_thái` = ?, `updated_at` = ? WHERE `Mã` = ? AND `Trạng_thái` = ?",[$ttkh[0]->Mã,1,$updated_at,$idve,0]))
			// {
				// return response()->json(['kq' => 1]); //Đăng ký vé thành công
			// }
			// else
			// {
				// return response()->json(['kq' => 0]); //Đăng ký vé thất bại
			// }
		// }
		// else
		// {
			// return response()->json(['kq' => 2]); //Chưa có tài khoản chuyển qua form nhập thông tin để đăng ký
		// }
	// }
	// public function dangkyve(Request $request) //Hàm đăng ký mới Sđt và đăng ký vé luôn
	// {
		// $phone = $request->phone; //Gửi lên phone
		// $name = $request->name; //Gửi lên name
		// $gioitinh = $request->gender; //Gửi lên gender
		// $ngaysinh = $request->ngaysinh; //Gửi lên ngaysinh
		// $idve = $request->idve; //Gửi lên idve
		// $ttkh = DB::table('khachhang')->where('Sđt','=',$phone)->get();
		// if(count($ttkh) == 0)
		// {
			// $created_at = date('Y-m-d h-i-s');
			// $updated_at = date('Y-m-d h-i-s');
			// if(DB::insert("INSERT INTO `customer`(`Tên`, `Ngày_sinh`, `Giới tính`, `Sđt`, `Password`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)",[$name,$ngaysinh,$gioitinh,$phone,md5($phone),$created_at,$updated_at]))
			// {
				// $tmp = DB::table('khachhang')->where('Sđt','=',$phone)->get();
				// $idkh = $tmp[0]->Mã;
				// if(DB::update("UPDATE `ve` SET `Mã_khách_hàng` = ?, `Trạng_thái` = ? WHERE `Mã` = ? AND `Trạng_thái` = ?",[$idkh,1,$idve,0]))
				// {
					// return response()->json(['kq' => 1]); //Đăng ký vé thành công
				// }
				// else
				// {
					// return response()->json(['kq' => 0]); //Đăng ký vé thất bại
				// }
			// }
			// else
			// {
				// return response()->json(['kq' => 0]); //Đăng ký vé thất bại
			// }
		// }
		// else
		// {
			// return response()->json(['kq' => 2]); //Đã có tài khoản chuyển qua form nhập Sđt ban đầu
		// }
	// }
}

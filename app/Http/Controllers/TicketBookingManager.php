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
	public function routedetails(Request $request)
	{
		$machuyenxe = $request->idchuyenxe;
		sleep(0);
		try
		{
			$loaixe = DB::table('chuyen_xe')->join('xe','chuyen_xe.Mã_xe','=','xe.Mã')->join('bus_model','xe.Mã_loại_xe','bus_model.Mã')->where('chuyen_xe.Mã','=',$machuyenxe)->select('bus_model.Loại_ghế','bus_model.Sơ_đồ','bus_model.Số_cột','bus_model.Số_hàng')->get();
			$ve = DB::table('ve')->leftJoin('customer','ve.Mã_khách_hàng','=','customer.Mã')->leftJoin('employee','ve.Mã_nhân_viên_đặt','=','employee.Mã')->where('ve.Mã_chuyến_xe','=',$machuyenxe)->select('ve.Mã','ve.Mã_khách_hàng','ve.Mã_chuyến_xe','ve.Trạng_thái','ve.Thời_điểm_chọn','ve.Vị_trí_ghế','customer.Tên','customer.Ngày_sinh','customer.Giới tính as Giới_tính','customer.Sđt','customer.Địa chỉ','ve.Mã_nhân_viên_đặt','employee.Họ_Tên')->orderBy('ve.Mã','asc')->get();
			foreach($ve as $key => $value)
			{
				if($ve[$key]->Thời_điểm_chọn != null)
				{
					$thoigiancon = 600 - intval(strtotime(date("Y-m-d H:i:s"))) + intval(strtotime($ve[$key]->Thời_điểm_chọn));
					$ve[$key]->Thời_gian_còn = $thoigiancon;
				}
				else
				{
					$ve[$key]->Thời_gian_còn = null;
				}
			}
			return response()->json(['kq' => 1,'loaixe' => $loaixe,'ve' => $ve]);
		} catch(\Exception $e)
		{
			return response()->json(['kq' => 0,'error' => $e]);
		}
	}
	public function qldv_chonve(Request $request)
	{
		$mave = $request->idve;
		$manhanvien = $request->idnhanvien;
		if(DB::select("SELECT * FROM ve WHERE Mã = ? AND Trạng_thái != 0",[$mave]))
		{
			return response()->json(['kq' => 0]);
		}
		else
		{
			try
			{
				DB::update("UPDATE `ve` SET `Trạng_thái` = 2, `Mã_nhân_viên_đặt` = ? WHERE `Mã` = ? AND `Trạng_thái` = 0",[$manhanvien,$mave]);
				// sleep(.1);
				$ve = DB::table('ve')->leftJoin('customer','ve.Mã_khách_hàng','=','customer.Mã')->leftJoin('employee','ve.Mã_nhân_viên_đặt','=','employee.Mã')->where('ve.Mã','=',$mave)->select('ve.Vị_trí_ghế','customer.Tên','customer.Sđt','employee.Họ_Tên')->get();
				return response()->json(['kq' => 1,'ttghe' => $ve]);
			} catch(\Exception $e)
			{
				return response()->json(['kq' => 0]);
			}
		}
	}
	public function qldv_huychonve(Request $request)
	{
		$mave = $request->idve;
		try
		{
			DB::update("UPDATE `ve` SET `Trạng_thái` = 0, `Mã_nhân_viên_đặt` = NULL WHERE `Mã` = ? AND `Trạng_thái` = 2",[$mave]);
			// sleep(.1);
			$ve = DB::table('ve')->leftJoin('customer','ve.Mã_khách_hàng','=','customer.Mã')->leftJoin('employee','ve.Mã_nhân_viên_đặt','=','employee.Mã')->where('ve.Mã','=',$mave)->select('ve.Vị_trí_ghế','customer.Tên','customer.Sđt','employee.Họ_Tên')->get();
			return response()->json(['kq' => 1,'ttghe' => $ve]);
		} catch(\Exception $e)
		{
			return response()->json(['kq' => 0]);
		}
	}
	public function qldv_huychonchuyenxe(Request $request)
	{
		$vitrive = $request->vitrive;
		$machuyenxe = $request->idchuyenxe;
		for($i=0;$i<count($vitrive);$i++)
		{
			try
			{
				DB::update("UPDATE `ve` SET `Trạng_thái` = 0, `Mã_nhân_viên_đặt` = NULL WHERE `Mã_chuyến_xe` = ? AND `Trạng_thái` = 2 AND `Vị_trí_ghế` = ?",[$machuyenxe,$vitrive[$i]]);
				// sleep(.1);
			} catch(\Exception $e)
			{
				return response()->json(['kq' => 0]);
			}
		}
		return response()->json(['kq' => 1]);
	}
	public function qldv_searchcustomer(Request $request) //Tìm khách hàng
	{
		$datasearch = $request->datasearch;
		$filtermode = $request->filtermode;
		$khongdau = strtolower(FunctionBase::convertAlias($datasearch));
		if($filtermode == 0)
		{
			$kq = DB::select(DB::raw("SELECT Mã,Tên,Sđt FROM customer WHERE BINARY LOWER(Tên_không_dấu) LIKE '%{$khongdau}%' OR Sđt LIKE BINARY '%{$khongdau}%'"));
			return response()->json(['kq' => 1,'data' => $kq]);
		}
		else if($filtermode == 1)
		{
			$kq = DB::select(DB::raw("SELECT Mã,Tên,Sđt FROM customer WHERE BINARY LOWER(Tên_không_dấu) LIKE '%{$khongdau}%'"));
			return response()->json(['kq' => 1,'data' => $kq]);
		}
		else if($filtermode == 2)
		{
			$kq = DB::select(DB::raw("SELECT Mã,Tên,Sđt FROM customer WHERE Sđt LIKE BINARY '%{$khongdau}%'"));
			return response()->json(['kq' => 1,'data' => $kq]);
		}
		return response()->json(['kq' => 0]);
	}
	public function qldv_infokhachhang(Request $request) //Xuất ra thông tin khách hàng đã đăng ký
	{
		$idkhachhang = $request->idkhachhang;
		try
		{
			$kq = DB::table('customer')->where('Mã','=',$idkhachhang)->select("Mã","Tên","Ngày_sinh","Giới tính as Giới_tính","Sđt","Email","Địa chỉ as Địa_chỉ")->get();
			if(!empty($kq))
			{
				$kq[0]->Ngày_sinh_hiển_thị = date("d-m-Y",strtotime($kq[0]->Ngày_sinh));
			}
			return response()->json(['kq' => 1,'data' => $kq]);
		}
		catch (\Exception $e)
		{
			return response()->json(['kq' => 0]);
		}
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
		// $ttkh = DB::table('customer')->where('Sđt','=',$phone)->get();
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
		// $ttkh = DB::table('customer')->where('Sđt','=',$phone)->get();
		// if(count($ttkh) == 0)
		// {
			// $created_at = date('Y-m-d h-i-s');
			// $updated_at = date('Y-m-d h-i-s');
			// if(DB::insert("INSERT INTO `customer`(`Tên`, `Ngày_sinh`, `Giới tính`, `Sđt`, `Password`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)",[$name,$ngaysinh,$gioitinh,$phone,md5($phone),$created_at,$updated_at]))
			// {
				// $tmp = DB::table('customer')->where('Sđt','=',$phone)->get();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Chuyenxe;
use App\Duongdi;
use App\Khachhang;
use App\Loaixe;
use App\Lotrinh;
use App\Nhanvien;
use App\Tinh;
use App\Tramdung;
use App\Ve;
use App\Xe;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public  function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function Index(){
        $tinh = DB::select("SELECT Tên FROM tinh");
        return view('tttn-web.index',["tinh" => $tinh]);
    }
    public function Chuyenxe1(Request $request){
        $Noidi = $request->Noidi;
        $Noiden = $request->Noiden;
        $Thoigian =  date('Y-m-d',strtotime($request->Ngaydi));
        $Chuyenxe = DB::table("chuyen_xe")->join("lo_trinh","chuyen_xe.Mã_lộ_trình","=","lo_trinh.Mã")->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")
            ->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")
            ->where("Nơi_đi","=", $Noidi)
            ->where("Nơi_đến","=",$Noiden)
            ->where("Trạng_thái","=","0")
            ->where("is_del","=",0)
            ->where('Ngày_xuất_phát','=',$Thoigian)
            ->select("Nơi_đi","Nơi_đến","Ngày_xuất_phát","Giờ_xuất_phát","lo_trinh.Thời_gian_đi_dự_kiến","chuyen_xe.Mã","Tiền_vé","Loại_ghế","Biển_số")
            ->get();
        foreach ($Chuyenxe as $key => $value ) {
            $time = $Chuyenxe[$key]->Ngày_xuất_phát." ".$Chuyenxe[$key]->Giờ_xuất_phát;
            $tmp = strtotime($time) + $Chuyenxe[$key]->Thời_gian_đi_dự_kiến;
            $Chuyenxe[$key]->Thời_gian_đến_dự_kiến = date('Y-m-d H:i:s',$tmp);
        }
        return view('tttn-web.chuyenxe',["Chuyenxe" => $Chuyenxe]);
    }
    public function Chuyenxe2(Request $request){
        $Noidi = $request->Noidi;
        $Noiden = $request->Noiden;
        $Giuong = $request->Giuong;
        $Thoigian =  date('Y-m-d',strtotime($request->Ngaydi));
        $Chuyenxe = DB::table("chuyen_xe")->join("lo_trinh","chuyen_xe.Mã_lộ_trình","=","lo_trinh.Mã")->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")
            ->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")
            ->where("Nơi_đi","=", $Noidi)
            ->where("Nơi_đến","=",$Noiden)
            ->where("Trạng_thái","=","0")
            ->where("is_del","=",0)
            ->where('Ngày_xuất_phát','=',$Thoigian)
            ->where('bus_model.Loại_ghế','=',$Giuong)
            ->select("Nơi_đi","Nơi_đến","Ngày_xuất_phát","Giờ_xuất_phát","lo_trinh.Thời_gian_đi_dự_kiến","chuyen_xe.Mã","Tiền_vé","Loại_ghế","Biển_số")
            ->get();
             foreach ($Chuyenxe as $key => $value ) {
            $time = $Chuyenxe[$key]->Ngày_xuất_phát." ".$Chuyenxe[$key]->Giờ_xuất_phát;
            $tmp = strtotime($time) + $Chuyenxe[$key]->Thời_gian_đi_dự_kiến;
            $Chuyenxe[$key]->Thời_gian_đến_dự_kiến = date('Y-m-d H:i:s',$tmp);
        }
        return view('tttn-web.chuyenxe',["Chuyenxe" => $Chuyenxe]);
    }
    public function Datve() {
          $tinh = DB::select("SELECT Tên FROM tinh");
        return view('tttn-web.datve',["tinh" => $tinh]);
    }
    public function Chonve($id){
        $chonve = DB::table("chuyen_xe")->join("lo_trinh","chuyen_xe.Mã_lộ_trình","=","lo_trinh.Mã")->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")->where("chuyen_xe.Mã","=",$id)->select("chuyen_xe.Mã","Ngày_xuất_phát","Giờ_xuất_phát","Nơi_đến","Nơi_đi","Loại_ghế","Tiền_vé")->get();
        $sodo = DB::table("chuyen_xe")->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")->where("chuyen_xe.Mã","=",$id)->select("Sơ_đồ","Loại_ghế")->get();
        $ve = DB::table("chuyen_xe")->join("ve","chuyen_xe.Mã","=","ve.Mã_chuyến_xe")->where("chuyen_xe.Mã","=",$id)->select("Vị_trí_ghế","ve.Trạng_thái","ve.Mã","ve.Mã_khách_hàng","ve.Thời_điểm_chọn")->get();
        $tmp = date("Y-m-d H:i:s");
        $tmp = strtotime($tmp);
        foreach ($ve as $key => $value ) {
            $time = $ve[$key]->Thời_điểm_chọn;
            $time = strtotime($time);
            $time = $tmp - $time;
            if($time < 600){
                $time = 600 - $time;
             }
             else{
                $time = null;
             }
            $ve[$key]->TG = $time;
        }
        return view('tttn-web.chonve',['chonve'=> $chonve,'ve'=>$ve,'sodo'=>$sodo,'id'=>$id]);
    }
    public function xulydatve(Request $request){
            $ma = $request -> MA;
            $makh = $request -> MAKH;
            $kt = DB::table("ve")->where("Mã","=",$ma)->select("Trạng_thái","Thời_điểm_chọn")->get();
            if($kt[0]->Trạng_thái == 0){
                $time = date("Y-m-d H:i:s");
                DB::update("UPDATE `ve` SET `Trạng_thái`= ?,`Mã_khách_hàng`= ?, `Thời_điểm_chọn`= ? WHERE `Mã`= ?",
                        [2,$makh,$time,$ma]);
                sleep(600);
                $kt2 = DB::table("ve")->where("Mã","=",$ma)->select("Trạng_thái","Mã_khách_hàng","Mã","Thời_điểm_chọn")->get();
                if($kt2[0]->Trạng_thái == 2  && $kt2[0]->Thời_điểm_chọn == $time){
                    DB::update("UPDATE `ve` SET `Trạng_thái`= ?,`Mã_khách_hàng`= ?, `Thời_điểm_chọn`=? WHERE `Mã`= ?",
                        [0,null,null,$ma]);
                }
                return \response()->json(['kq'=>0]);
            }
            else if($kt[0]->Trạng_thái == 1){
                 return \response()->json(['kq'=>1]);
            }
            else if($kt[0]->Trạng_thái == 2){
                $tmp = date("Y-m-d H:i:s");
                $tmp = strtotime($tmp);
                $time = $kt[0]->Thời_điểm_chọn;
                $time = strtotime($time);
                $time = $tmp - $time;
                if($time < 600){
                $time = 600 - $time;
                }
                else{
                 $time = null;
                }
                 return \response()->json(['kq'=>2,'TGC'=>$time]);
            }
        }
     
    public function xulydatve2(Request $request){
       

            $ma = $request -> MA;
            DB::update("UPDATE `ve` SET `Trạng_thái`= ?,`Mã_khách_hàng`= ?, `Thời_điểm_chọn`= ? WHERE `Mã`= ?",
                    [0,Null,Null,$ma]);
            return \response()->json(['kq'=>1]);

    }
    public function chondatve(Request $request){
        $id = $request-> ID;
        $mang = $request-> MANG;
        $makh = $request -> MAKH;
        $dodai = $request -> DODAI;
        for($i=0;$i<$dodai;$i++){
            if($mang[$i] != null){
               DB::update("UPDATE `ve` SET `Trạng_thái`= ?,`Mã_khách_hàng`= ? WHERE `Mã`= ?",
                    [1,$makh,$mang[$i]]); 
            }
        }
        DB::table("ve")->where("Mã_khách_hàng","=","$makh")->where("Trạng_thái","=","2")->update(["Trạng_thái"=>1]);
        return \response()->json(['id'=>$id,'makh'=>$makh]);
    }
    public function thongtinve($id,$makh){
         $chonve = DB::table("chuyen_xe")->join("lo_trinh","chuyen_xe.Mã_lộ_trình","=","lo_trinh.Mã")->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")->where("chuyen_xe.Mã","=",$id)->select("Ngày_xuất_phát","Giờ_xuất_phát","Nơi_đến","Nơi_đi","Loại_ghế","Tiền_vé")->get();
         $vedadat = DB::table("ve")->where("Mã_chuyến_xe","=",$id)->where("Mã_khách_hàng","=",$makh)->select("Vị_trí_ghế")->get();
        return view('tttn-web.thongtinve',["chonve" => $chonve,"vedadat"=>$vedadat]);
    }
   
    /*dangky*/
    public function dangky(Request $request){
        $sdt = $request->SDT;
        $mk = $request->MK;
        $ngaysinh = $request->NGAYSINH;
        $gt = $request->GT;
        $name = $request->NAME;
        $namekd = FunctionBase::convertAlias($name);
        $kt = DB::select("SELECT * FROM customer WHERE Sđt = ? ",[$sdt]);
        if(!$kt){
            $account = new Khachhang;
            $account["Sđt"] = $sdt;
            $account["Password"] = md5($mk);
            $account["Tên"] = $name;
            $account["Tên_không_dấu"] =$namekd;
            $account["Ngày_sinh"] = $ngaysinh;
            $account["Giới tính"] = $gt;
            $account->save();
			$id = $account->Mã;
            return \response()->json(['kq'=>1,'id' => $id]);
           
        }
        else{
            return \response()->json(['kq'=>0]);
        }
    }
    /*dangnhap*/
    public function dangnhap(Request $request){
        $dndt = $request->DNDT;
        $dnmk = md5($request->DNMK);
        $dnkt = DB::select("SELECT * FROM customer WHERE Sđt = ? AND Password = ?",[$dndt,$dnmk]);
        if($dnkt){
            $makh = $dnkt[0]->Mã;
            $sdt = $dnkt[0]->Sđt;
            $request->session()->put("makh", $makh);
            $request->session()->put("sdt", $sdt);
            return \response()->json(['kq'=>1,'sdt'=>$sdt,'ma'=>$makh]);
        }
        else{
            return \response()->json(['kq'=>0]);
        }

    }
    /*cap nhat thong tin*/
    public function capnhattt(Request $request){
        $ma = $request->MA;
        $name = $request->NAME;
        $namekd = FunctionBase::convertAlias($name);
        $ngaysinh = $request->NGAYSINH;
        $gt = $request->GT;
        $diachi = $request->DIACHI;
        $email = $request->EMAIL;
        $kt = DB::select("SELECT * FROM customer WHERE EMAIL = ? AND Mã != ?",[$email,$ma]);
        if(!$kt){
            DB::update("UPDATE `customer` SET `Tên`= ?, `Tên_không_dấu`= ?, `Giới tính`= ?, `Ngày_sinh`= ?, `Địa chỉ`= ?, `Email`= ? WHERE `Mã`= ?",[$name,$namekd,$gt,$ngaysinh,$diachi,$email,$ma]); 
            return \response()->json(['kq'=>1]);
        }
        else{
            return \response()->json(['kq'=>0]);
        }
    }
     /*thong tin khach*/
    public function thongtin($makh){
        $thongtinkhach = DB::table("customer")->where("Mã","=","$makh")->select("Mã","Tên","Ngày_sinh","Giới tính","Địa chỉ","Email","Sđt")->get();
        $ve = DB::table("ve")->join("chuyen_xe","chuyen_xe.Mã","=","ve.Mã_chuyến_xe")
        ->join("lo_trinh","chuyen_xe.Mã_lộ_trình","=","lo_trinh.Mã")
        ->join("xe","chuyen_xe.Mã_xe","=","xe.Mã")->join("bus_model","xe.Mã_loại_xe","=","bus_model.Mã")
        ->where("ve.Mã_khách_hàng","=",$makh)
        ->where("ve.Trạng_thái","=",1)
        ->select("Vị_trí_ghế","ve.Trạng_thái","ve.Mã","Nơi_đi","Nơi_đến","Ngày_xuất_phát","Giờ_xuất_phát","Tiền_vé","Loại_ghế","ve.Mã_chuyến_xe",'lo_trinh.Thời_gian_đi_dự_kiến')
        ->get();
        $chuyenxe = [];
        $daduyet = [];
        $dem = 0;
        foreach ($ve as $key => $value ) {
            $check = 0;
            if(count($daduyet)!=0){
                for($i=0;$i<count($daduyet);$i++){
                    if($value->Mã_chuyến_xe == $daduyet[$i]){
                        $check = 1;
                        break;
                    }
                }
            }
            if($check == 1){
                continue;
            }
            $daduyet[$dem] = $value->Mã_chuyến_xe;
            $chuyenxe[$dem] = $value;
            $time = $chuyenxe[$dem]->Ngày_xuất_phát." ".$chuyenxe[$dem]->Giờ_xuất_phát;
            $tmp = strtotime($time) + $chuyenxe[$dem]->Thời_gian_đi_dự_kiến;
            $chuyenxe[$dem]->Thời_gian_đến_dự_kiến = date('Y-m-d H:i:s',$tmp);
            foreach ($ve as $key1 => $value1) {
                if($key1 != $key&&$value1->Mã_chuyến_xe == $chuyenxe[$dem]->Mã_chuyến_xe){
                    $chuyenxe[$dem]->Vị_trí_ghế .= (",".$ve[$key1]->Vị_trí_ghế);
               }
            }
            $dem++;
        }
        return view('tttn-web.thongtinkhach',["thongtinkhach"=>$thongtinkhach,"lichsudi"=>$chuyenxe]);
    }
    /*doi mat khau*/
    public function doimatkhau(Request $request){
        $ma = $request->MA;
        $mkcu = md5($request->MKCU);
        $mkmoi= md5($request->MKMOI);
        $dnkt = DB::select("SELECT * FROM customer WHERE Mã = ? AND Password = ?",[$ma,$mkcu]);
        if($dnkt){
             DB::update("UPDATE `customer` SET `Password`= ? WHERE `Mã`= ?",[$mkmoi,$ma]);
             return \response()->json(['kq'=>1]);
        }
        else{
            return \response()->json(['kq'=>0]);
        }
    }
    /***/
    public function checkConnection(){
        try {

            DB::connection()->getPdo();
            echo 'Successfully!';
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
    }

    public function register(Request $request){
        try {
            $account = new Khachhang;
            $account["Sđt"] = $request->query("phone");
            $account["Password"] = md5($request->query("password"));
            $account->save();
        } catch (\Exception $e) {
            die("Không thể đăng ký được tài khoản: ".$e);
        }
    }
    public function addBusModel(Request $request){
        try {
            $busmodel = new Loaixe;
            $busmodel["Tên_Loại"] = $request->query("busname");
            $busmodel["Số_ghế"] = $request->query("soghe");
            $busmodel["Sơ_đồ"] = $request->query("sodo");
            $busmodel["Mã_nhân_viên_tạo"] = $request->query("nhanvientao");
            $busmodel["Mã_nhân_viên_chỉnh_sửa"] = $request->query("nhanviensua");
            $busmodel->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addChuyenxe(Request $request){
        try {
            $chuyenxe = new Chuyenxe;
            $chuyenxe["Mã_nhân_viên_tạo"] = $request->query("nhanvientao");
            $chuyenxe["Mã_lộ_trình"] = $request->query("lotrinh");
            $chuyenxe["Mã_tài_xế"] = $request->query("taixe");
            $chuyenxe["Mã_xe"] = $request->query("xe");
            $chuyenxe["Thời_gian_xuất_phát"] = $request->query("starttime");
            $chuyenxe->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addDuongdi(Request $request){
        try {
            $duongdi = new Duongdi;
            $duongdi["Mã_Trạm_Start"] = $request->query("tramkhoihanh");
            $duongdi["Mã_Trạm_End"] = $request->query("tramcuoi");
            $duongdi["Tọa_độ_detail"] = $request->query("toadochitiet");
            $duongdi->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addLotrinh(Request $request){
        try {
            $lotrinh = new Lotrinh;
            $lotrinh["Mã_nhân_viên_tạo"] = $request->query("nhanvientao");
            $lotrinh["Mã_nhân_viên_chỉnh_sửa"] = $request->query("nhanviensua");
            $lotrinh["Nơi_đi"] = $request->query("noidi");
            $lotrinh["Nơi_đến"] = $request->query("noiden");
            $lotrinh["Các_trạm_dừng_chân"] = $request->query("cactramdung");
            $lotrinh->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addProvince(Request $request){
        try {
            $province = new Tinh;
            $province["Tên"] = $request->query("province");
            $province["Mã_vùng"] = $request->query("localcode");
            $province->save();
        } catch (\Exception $e) {
            die("Không thể thêm tỉnh/thành phố: ".$e);
        }
    }
    public function addTramdung(Request $request){
        try {
            $tramdung = new Tramdung;
            $tramdung["Tên"] = $request->query("tentramdung");
            $tramdung["Tọa_độ"] = $request->query("toado");
            $tramdung["Mã_nhân_viên_tạo"] = $request->query("nhanvientao");
            $tramdung["Mã_nhân_viên_chỉnh_sửa"] = $request->query("nhanviensua");
            $tramdung->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addVe(Request $request){
        try {
            $ve = new Ve;
            $ve["Mã_chuyến_xe"] = $request->query("chuyenxe");
            $ve["Vị_trí_ghế"] = $request->query("gheso");
            $ve["Giá"] = $request->query("gia");
            $ve["Trạng_thái"] = $request->query("trangthai");
            $ve->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
    public function addXe(Request $request){
        try {
            $xe = new Xe;
            $xe["Biển_số"] = $request->query("bienso");
            $ve["Mã_loại_xe"] = $request->query("loaixe");
            $ve["Ngày_bảo_trì_gần_nhất"] = $request->query("baotrigannhat");
            $ve["Ngày_bảo_trì_tiếp_theo"] = $request->query("baotritieptheo");
            $ve->save();
        } catch (\Exception $e) {
            die("Có lỗi xảy ra: ".$e);
        }
    }
}

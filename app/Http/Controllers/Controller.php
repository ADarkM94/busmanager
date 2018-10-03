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

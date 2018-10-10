<?php

namespace App\Http\Controllers;

use core_question\bank\view;
use gradereport_singleview\local\screen\select;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Khachhang;
use App\Nhanvien;
use App\Loaixe;
use App\Xe;
use App\Tramdung;
use App\Lotrinh;
use App\Tinh;
use phpDocumentor\Reflection\Types\Integer;

class AdminController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function test(){
        echo "Thành công!";
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    /*public function login(Request $request){
        echo "Kết quả:";
        echo $request->username;
        echo bcrypt($request->password);
    }*/

    //Phần khách hàng
    public function khachhang(){
        $customer = Khachhang::all();
        return view('quantrivien.khachhang', compact('customer'));
    }

    public function addkhachhang($index=""){
        if($index==""){
            return view("quantrivien.addkhachhang");
        }
        try {
            $ttkhachhangs = DB::select("SELECT * FROM customer WHERE Mã = ?",[$index]);
            foreach ($ttkhachhangs as $row){
                $ttkhachhang = $row;
            }
            return view("quantrivien.addkhachhang",["ttkhachhang" => $ttkhachhang]);
        } catch (\Exception $e) {
            die("Lỗi: ".$e);
        }
    }

    public  function addcustomer(Request $request){
        $name = $request->name;
        $brtday = $request->brtday;
        $gender = $request->gender;
        $address = $request->address;
        $nickname = $request->nickname;
        $password = md5($request->password);
        $email = $request->email;
        $phone = $request->phone;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(isset($request->ID)){
            if(DB::update("UPDATE `customer` SET `Tên`= ?,`Ngày_sinh`= ?,`Giới tính`= ?,`Địa chỉ`= ?,`Nickname`= ?,`Password`= ?,`Email`= ?,`Sđt`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$name,$brtday,$gender,$address,$nickname,$password,$email,$phone,$updated_at,$request->ID]))
                return redirect()->back()->with('alert','Sửa thành công!');
            else
                return redirect()->back()->with('alert','Sửa thất bại!');
        }
        else {
            if(!DB::select('select * from customer where Email = ? or Sđt = ? or Tên = ?',[$request->email,$request->phone,$request->name]))
            {
                DB::insert("INSERT INTO `customer`(`Tên`, `Ngày_sinh`, `Giới tính`, `Địa chỉ`, `Nickname`, `Password`, `Email`, `Sđt`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?,?,?,?)",
                    [$name,$brtday,$gender,$address,$nickname,$password,$email,$phone,$created_at,$updated_at]);
                return redirect()->back()->with('alert','Thêm thành công!');
            }
            else
                return redirect()->back()->with('alert','Thêm thất bại!');
        }
    }

    public function delcustomer($id){
        try {
            DB::delete('DELETE FROM customer WHERE Mã = ?',[$id]);
        } catch (\Exception $e) {
            die("Lỗi xóa dữ liệu :".$e);
        }
        return redirect()->back();
    }

    //Phần nhân viên
    public function nhanvien(){
        $nhanvien = Nhanvien::all();
        return view("quantrivien.nhanvien",["employee"=>$nhanvien]);
    }
    public function addnhanvien($index = ""){
        if($index == ""){
            return view("quantrivien.addnhanvien");
        }
        try {
            $ttnhanviens = DB::select("SELECT * FROM employee WHERE Mã = ?",[$index]);
            foreach ($ttnhanviens as $row){
                $ttnhanvien = $row;
            }
            return view("quantrivien.addnhanvien",["ttnhanvien" => $ttnhanvien]);
        } catch (\Exception $e) {
            die("Lỗi: ".$e);
        }
    }
    public  function addemployee(Request $request){
        $name = $request->name;
        $brtday = $request->brtday;
        $gender = $request->gender;
        $address = $request->address;
        $username = $request->username;
        $password = md5($request->password);
        $email = $request->email;
        $phone = $request->phone;
        $type = $request->typenv;
        $banglai = $request->banglai;
        $chinhanh = $request->chinhanh;
        $datestart = $request->datestart;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(isset($request->ID)){
            if(DB::update("UPDATE `employee` SET `Họ_Tên`= ?,`Ngày_sinh`= ?,`Giới_tính`= ?,`Địa_chỉ`= ?,`Username`= ?,`Password`= ?,`Email`= ?,`Sđt`= ?,`Loại_NV`= ?,`Bằng_lái`= ?,`Chi_nhánh`= ?,`Date_Starting`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$name,$brtday,$gender,$address,$username,$password,$email,$phone,$type,$banglai,$chinhanh,$datestart,$updated_at,$request->ID]))
                return redirect()->back()->with('alert','Sửa thành công!');
            else
                return redirect()->back()->with('alert','Sửa thất bại!');
        }
        else {
            if(!DB::select('select * from employee where Email = ? or Sđt = ? or Họ_Tên = ?',[$request->email,$request->phone,$request->name]))
            {
                DB::insert("INSERT INTO `employee`(`Họ_Tên`, `Ngày_sinh`, `Giới_tính`, `Địa_chỉ`, `Username`, `Password`, `Email`, `Sđt`, `Loại_NV`,`Bằng_lái`,`Chi_nhánh`,`Date_Starting`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    [$name,$brtday,$gender,$address,$username,$password,$email,$phone,$type,$banglai,$chinhanh,$datestart,$created_at,$updated_at]);
                return redirect()->back()->with('alert','Thêm thành công!');
            }
            else
                return redirect()->back()->with('alert','Thêm thất bại!');
        }
    }
    public function delemployee($id){
        try {
            DB::delete('DELETE FROM employee WHERE Mã = ?',[$id]);
        } catch (\Exception $e) {
            die("Lỗi xóa dữ liệu :".$e);
        }
        return redirect()->back();
    }

    //Phần loại xe
    public function loaixe(){
        $busmodel = Loaixe::all();
        foreach ($busmodel as $row){
            $filepath = 'busmodel/'.$row['Sơ_đồ'].'.txt';
            if(file_exists($filepath)) {
                $file = fopen($filepath,'r');
                $model[$row['Sơ_đồ']]=fread($file,filesize($filepath));
                fclose($file);
            }
            else {
                $model[$row['Sơ_đồ']]='';
            }

        }
        return view('quantrivien.loaixe',compact('busmodel','model'));
    }
    public function addbusmodel(Request $request){
        $name = $request->name;
        $row = $request->row;
        $col = $request->col;
        $employeeid = $request->employeeID;
        $soghe = $request->soghe;
        $sodo = $request->sodo;
        $noidung = $request->noidung;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(!empty($request->ID)) {
            if (DB::update("UPDATE `bus_model` SET `Tên_Loại`= ?,`Số_ghế`= ?,`Số_hàng`= ?,`Số_cột`= ?,`Sơ_đồ`= ?,`Mã_nhân_viên_chỉnh_sửa`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$name, $soghe, $row, $col, $sodo, $employeeid, $updated_at, $request->ID]))
            {
                $filepath = 'busmodel/' . $sodo . '.txt';
                $file = fopen($filepath, 'w+');
                fwrite($file, $noidung);
                fclose($file);
                return redirect()->back()->with('alert', 'Sửa thành công!');
            }
            else
                return redirect()->back()->with('alert','Sửa thất bại!');
        }
        else {
            if( DB::insert("INSERT INTO `bus_model`(`Tên_Loại`, `Số_ghế`, `Số_hàng`, `Số_cột`, `Sơ_đồ`, `Mã_nhân_viên_tạo`, `Mã_nhân_viên_chỉnh_sửa`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?,?,?)",
                [$name,$soghe,$row,$col,$sodo,$employeeid,$employeeid,$created_at,$updated_at]))
            {
                $filepath = 'busmodel/' . $sodo . '.txt';
                $file = fopen($filepath, 'w+');
                fwrite($file, $noidung);
                fclose($file);
                return redirect()->back()->with('alert','Thêm thành công!');
            }
            else
                return redirect()->back()->with('alert','Thêm thất bại!');
        }
    }
    public function delbusmodel($id){
        try {
            DB::delete('DELETE FROM bus_model WHERE Mã = ?',[$id]);
        } catch (\Exception $e) {
            die("Lỗi xóa dữ liệu :".$e);
        }
        return redirect()->back();
    }

    //Phần xe
    public function xe(){
        $bus = Xe::all();
        $typebuses = Loaixe::all();
        $typebus = [];
        foreach ($typebuses as $row){
            $typebus["{$row['Mã']}"]=$row['Tên_Loại'];
        }
        return view('quantrivien.xe',compact('bus','typebus'));
    }
    public function addxe($index = ""){
        $bustypes = DB::select("SELECT Mã,Tên_Loại FROM bus_model");
        if($index == ""){
            return view("quantrivien.addxe",["bustypes"=>$bustypes]);
        }
        try {
            $ttxes = DB::select("SELECT * FROM xe WHERE Mã = ?",[$index]);
            foreach ($ttxes as $row){
                $ttxe = $row;
            }
            return view("quantrivien.addxe",["ttxe" => $ttxe,"bustypes"=>$bustypes]);
        } catch (\Exception $e) {
            die("Lỗi: ".$e);
        }
    }
    public  function addbus(Request $request){
        $bienso = $request->bienso;
        $idtypebus = $request->idtypebus;
        $gannhat = $request->baotrigannhat;
        $tieptheo = $request->baotritieptheo;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(isset($request->ID)){
            if(DB::update("UPDATE `xe` SET `Biển_số`= ?,`Mã_loại_xe`= ?,`Ngày_bảo_trì_gần_nhất`= ?,`Ngày_bảo_trì_tiếp_theo`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$bienso,$idtypebus,$gannhat,$tieptheo,$updated_at,$request->ID]))
                return redirect()->back()->with('alert','Sửa thành công!');
            else
                return redirect()->back()->with('alert','Sửa thất bại!');
        }
        else {
            if( DB::insert("INSERT INTO `xe`(`Biển_số`, `Mã_loại_xe`, `Ngày_bảo_trì_gần_nhất`, `Ngày_bảo_trì_tiếp_theo`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)",
                [$bienso,$idtypebus,$gannhat,$tieptheo,$created_at,$updated_at]))
            {
                return redirect()->back()->with('alert','Thêm thành công!');
            }
            else
                return redirect()->back()->with('alert','Thêm thất bại!');
        }
    }
    public function delbus($id){
        try {
            DB::delete('DELETE FROM xe WHERE Mã = ?',[$id]);
        } catch (\Exception $e) {
            die("Lỗi xóa dữ liệu :".$e);
        }
        return redirect()->back();
    }

    //Phần trạm dừng
    public function tramdung(){
        $busstop = Tramdung::all();
        $employees = Nhanvien::all();
        foreach ($employees as $row){
            $employee["{$row['Mã']}"] = $row["Họ_Tên"];
        }
        return view("quantrivien.tramdung",compact('busstop','employee'));
    }
    public function addtramdung($index = ""){
        if($index == ""){
            return view("quantrivien.addtramdung");
        }
        try {
            $tttramdungs = DB::select("SELECT * FROM tram_dung WHERE Mã = ?",[$index]);
            foreach ($tttramdungs as $row){
                $tttramdung = $row;
            }
            return view("quantrivien.addtramdung",["tttramdung" => $tttramdung]);
        } catch (\Exception $e) {
            die("Lỗi: ".$e);
        }
    }
    public  function addbusstop(Request $request){
        $name = $request->name;
        $employeeid = $request->employeeID;
        $toado = $request->toado;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(isset($request->ID)){
            if(DB::update("UPDATE `tram_dung` SET `Tên`= ?,`Tọa_độ`= ?,`Mã_nhân_viên_chỉnh_sửa`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$name,$toado,$employeeid,$updated_at,$request->ID]))
                return redirect()->back()->with('alert','Sửa thành công!');
            else
                return redirect()->back()->with('alert','Sửa thất bại!');
        }
        else {
            if( DB::insert("INSERT INTO `tram_dung`(`Tên`, `Tọa_độ`, `Mã_nhân_viên_tạo`, `Mã_nhân_viên_chỉnh_sửa`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)",
                [$name,$toado,$employeeid,$employeeid,$created_at,$updated_at]))
            {
                return redirect()->back()->with('alert','Thêm thành công!');
            }
            else
                return redirect()->back()->with('alert','Thêm thất bại!');
        }
    }
    public function delbusstop($id){
        try {
            DB::delete('DELETE FROM tram_dung WHERE Mã = ?',[$id]);
        } catch (\Exception $e) {
            die("Lỗi xóa dữ liệu :".$e);
        }
        return redirect()->back();
    }

    //Phần lộ trình
    public function lotrinh($cm =""){
        $busstops = Tramdung::all();
        if($cm == "")
        {
            $busroute = Lotrinh::all();
            $province = Tinh::all();
            return view("quantrivien.lotrinh",compact('busroute','busstops','province'));
        }
        elseif($cm == "1"){
            $busroute = Lotrinh::all();
            return \response()->json(['msg'=>$busroute]);
        }
        elseif($cm == "2"){
            $province = Tinh::all();
            return \response()->json(['msg'=>$province]);
        }
    }
    public function addbusroute(Request $request) {
        $noidi = $request->noidi;
        $noiden = $request->noiden;
        $employeeid = $request->employeeID;
        $busstops = $request->busstops;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if($request->ID != ""){
            if(DB::update("UPDATE `lo_trinh` SET `Nơi_đi`= ?,`Nơi_đến`= ?,`Các_trạm_dừng_chân`= ?,`Mã_nhân_viên_chỉnh_sửa`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$noidi,$noiden,$busstops,$employeeid,$updated_at,$request->ID]))
                return \response()->json(['result'=>'1']);
            else
                return \response()->json(['result'=>'0']);
        }
        else {
            if( DB::insert("INSERT INTO `lo_trinh`(`Nơi_đi`, `Nơi_đến`, `Các_trạm_dừng_chân`, `Mã_nhân_viên_tạo`, `Mã_nhân_viên_chỉnh_sửa`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)",
                [$noidi,$noiden,$busstops,$employeeid,$employeeid,$created_at,$updated_at]))
            {
                return \response()->json(['result'=>'1']);
            }
            else
                return \response()->json(['result'=>'0']);
        }
    }
    public function delbusroute(Request $request) {
        if(isset($request->ID)) {
            try {
                DB::delete('DELETE FROM lo_trinh WHERE Mã = ?',[$request->ID]);
            } catch (\Exception $e) {
                return \response()->json(['result'=>'0']);
            }
            return \response()->json(['result'=>'1']);
        }
    }

    //Phần tỉnh
    public function addprovince(Request $request) {
        $name = $request->name;
        $mavung = $request->mavung;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if($request->ID != ""){
            if(DB::update("UPDATE `tinh` SET `Tên`= ?,`Mã_vùng`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$name,$mavung,$updated_at,$request->ID]))
                return \response()->json(['result'=>'1']);
            else
                return \response()->json(['result'=>'0']);
        }
        else {
            if( DB::insert("INSERT INTO `tinh`(`Tên`, `Mã_vùng`, `created_at`, `updated_at`) VALUES (?,?,?,?)",
                [$name,$mavung,$created_at,$updated_at]))
            {
                return \response()->json(['result'=>'1']);
            }
            else
                return \response()->json(['result'=>'0']);
        }
    }
    public function delprovince(Request $request) {
        if(isset($request->ID)) {
            try {
                DB::delete('DELETE FROM tinh WHERE Mã = ?',[$request->ID]);
            } catch (\Exception $e) {
                return \response()->json(['result'=>'0']);
            }
            return \response()->json(['result'=>'1']);
        }
    }

    //Phần chuyến xe
    public function chuyenxe() {
        $chuyenxe = DB::table('chuyen_xe')->join('employee','chuyen_xe.Mã_nhân_viên_tạo','=','employee.Mã')
            ->join('lo_trinh','chuyen_xe.Mã_lộ_trình','=','lo_trinh.Mã')->join('xe','chuyen_xe.Mã_xe','=','xe.Mã')
            ->join('employee as employee1','chuyen_xe.Mã_tài_xế','=','employee1.Mã')
            ->select('chuyen_xe.Mã','employee.Họ_Tên as Nhân_viên_tạo','employee1.Họ_Tên as Tài_xế','lo_trinh.Nơi_đi','lo_trinh.Nơi_đến','xe.Biển_số')
            ->get();
        return view("quantrivien.chuyenxe",compact('chuyenxe'));
    }
    public function addchuyenxe($id = "") {
        if($id == "") {

        }
        else {
            $ttchuyenxes = DB::table('chuyen_xe')->join('employee','chuyen_xe.Mã_nhân_viên_tạo','=','employee.Mã')
                ->join('lo_trinh','chuyen_xe.Mã_lộ_trình','=','lo_trinh.Mã')->join('xe','chuyen_xe.Mã_xe','=','xe.Mã')
                ->join('employee as employee1','chuyen_xe.Mã_tài_xế','=','employee1.Mã')
                ->where('chuyen_xe.Mã','=',$id)
                ->select('chuyen_xe.Mã','chuyen_xe.Mã_nhân_viên_tạo','employee.Họ_Tên as Nhân_viên_tạo','chuyen_xe.Mã_tài_xế','employee1.Họ_Tên as Tài_xế','chuyen_xe.Mã_lộ_trình','lo_trinh.Nơi_đi','lo_trinh.Nơi_đến','chuyen_xe.Mã_xe','xe.Biển_số','chuyen_xe.Thời_gian_xuất_phát')
                ->get();
            foreach ($ttchuyenxes as $row){
                $ttchuyenxe = $row;
            }
            $lotrinhs = Lotrinh::all();
            $taixes = DB::table('employee')->where('Loại_NV','=','TX')->select('Mã','Họ_Tên')->get();
            $xes = Xe::all();
            return view("quantrivien.addchuyenxe",compact('ttchuyenxe','lotrinhs','taixes','xes'));
        }
    }
    public function addchuyenxexl(Request $request) {
        $employeeid =$request->employeeID;
        $idlotrinh = $request->idlotrinh;
        $idtaixe = $request->idtaixe;
        $idxe = $request->idxe;
        $starttime = $request->startdate.' '.$request->starttime;
        $created_at = date('Y-m-d h-i-s');
        $updated_at = date('Y-m-d h-i-s');
        if(isset($request->ID)){
            if(DB::update("UPDATE `chuyen_xe` SET `Mã_lộ_trình`= ?,`Mã_tài_xế`= ?,`Mã_xe`= ?,`Thời_gian_xuất_phát`= ?,`updated_at`= ? WHERE `Mã`= ?",
                [$idlotrinh,$idtaixe,$idxe,$starttime,$updated_at,$request->ID]))
                return \response()->json(['result'=>'1']);
            else
                return \response()->json(['result'=>'0']);
        }
        else {
            if( DB::insert("INSERT INTO `chuyen_xe`(`Mã_nhân_viên_tạo`, `Mã_lộ_trình`, `Mã_tài_xế`, `Mã_xe`, `Thời_gian_xuất_phát`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)",
                [$employeeid,$idlotrinh,$idtaixe,$idxe,$starttime,$created_at,$updated_at]))
            {
                $loaixes = DB::table('xe')->join('bus_model','xe.Mã_loại_xe','=','bus__model.Mã')
                    ->where('xe.Mã','=',$idxe)->select('bus_model.Số_hàng','bus_model.Số_cột','bus_model.Sơ_đồ')
                    ->get();
                foreach ($loaixes as $row){
                    $loaixe = (array)$row;
                }
                $filepath = 'busmodel/'.$loaixe["Sơ_đồ"].'.txt';
                $file = fopen($filepath,'r');
                $sodo = fread($file,filesize($filepath));
                fclose($file);
                $row = integerValue($loaixe["Số_hàng"]);
                $col  = integerValue($loaixe["Số_cột"]);s
                for ($i = 0;$i<$row;$i++){
                    for ($j = 0;$j<$col;$j++){
                        $k = 1;
                        if(i*$col+j == 0)
                            continue;
                        if($sodo[i*$col+j]==1){
                            DB::insert("INSERT INTO `ve`(`Mã_nhân_viên_tạo`, `Mã_lộ_trình`, `Mã_tài_xế`, `Mã_xe`, `Thời_gian_xuất_phát`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)",
                                [$employeeid,$idlotrinh,$idtaixe,$idxe,$starttime,$created_at,$updated_at])
                        }
                    }
                }
                return \response()->json(['result'=>'1']);
            }
            else
                return \response()->json(['result'=>'0']);
        }
    }
}

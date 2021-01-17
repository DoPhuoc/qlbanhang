<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCoupon;
use App\Coupons;
use RealRashid\SweetAlert\Facades\Alert;
use  App\Http\Requests\StoreUpdateCoupon;
use Illuminate\Support\Facades\DB;
class CouponController extends Controller
{
    public function index(){
        $coupons =Coupons::all();
        return view('admin.coupon.list',compact('coupons'));
    }
    public function addCoupon(){
        return view('admin.coupon.add');
    }
    public function postaddCoupon(StoreCoupon $request){
        $code = $request->code;
        $status = $request->status;
        $data =Coupons::create([
            'code' => $code,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        if($data){
            Alert::success('Thêm thành công');
            return redirect()->route('admin.coupon');
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.add.coupon');
        }
    }

    public function geteditCoupon($id){
        $coupons =Coupons::find($id);
        return view('admin.coupon.edit',compact('coupons'));
    }
    public function posteditCoupon(StoreUpdateCoupon $request){
        $id = $request->id;
        $code = $request->code;
        $status =$request->status;
        $update = DB::table('coupons')
        ->where('id', $id)
        ->update([
            'code' => $code,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        
        if($update){
            Alert::success('Sửa thành công');
            return redirect()->route('admin.coupon');

        } else {
            Alert::error('Sửa thất bại');
            return redirect()->route('admin.add.coupon');

        }
        return redirect(route('admin.category'));
    }
    public function deleteCoupon($id){
        $coupons =Coupons::find($id);
        $status=$coupons->delete();
        if($coupons){
            Alert::success('Xóa thành công');
            return redirect()->route('admin.coupon');
        }
        else{
            Alert::error('Xóa thất bại');
            return redirect()->route('admin.coupon');
        }
    }
    
}

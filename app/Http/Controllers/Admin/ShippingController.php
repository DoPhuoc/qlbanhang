<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Http\Requests\StoreShipping;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUpdateShipping;
use Illuminate\Support\Facades\DB;
class ShippingController extends Controller
{
    public function index(){
        $shippings=Shipping::orderBy('id')->paginate(10);
        return view('admin.shipping.list',compact('shippings'));
    }
    public function addShipping(){
        return view('admin.shipping.add');
    }
    public function postaddShipping(StoreShipping $request){
        $title =$request->title;
        $price =$request->price;
        $status=$request->status;
        $dataInsert = Shipping::create([
            'title' => $title,
            'price' => $price,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        if($dataInsert){
            Alert::success('Thêm thành công');
            return redirect()->route('admin.shipping');
        }
        else{
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.add.shipping');
        }
    }
    public function editShipping($id){
        $shipping = DB::table('shippings')
        ->where('id', $id)
        ->first();
        return view('admin.shipping.edit',compact('shipping'));
    }
    public function postEditShipping(StoreUpdateShipping $request){
        $id= $request->id;
        $title =$request->title;
        $price =$request->price;
        $status=$request->status;
        $update = DB::table('shippings')
        ->where('id', $id)
        ->update([
            'title' => $title,
            'price' => $price,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        if($update){
        Alert::success('Sửa thành công');
        return redirect()->route('admin.shipping');

        } else {
        Alert::error('Sửa thất bại');
        return redirect()->route('admin.edit.shipping');
        }  
    }
    public function deleteShipping($id)
    {
        $shipping=Shipping::find($id);
        $status=$shipping->delete();
        if($shipping){
            Alert::success('Xóa thành công');
            return redirect()->route('admin.shipping');
           
        } else {
            Alert::error('Xóa thất bại');
            return redirect()->route('admin.shipping');
        }     
    }
    public function searchShipping(Request $request)
    {   
        $search = $request->get('search');
        $shippings = Shipping::where('price','like','%' . $search . '%')
        ->orWhere('price','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
        dd($shippings);
        return view('admin.shipping.list',compact('shippings'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreBrandPost;
use App\Model\Brand;
use RealRashid\SweetAlert\Facades\Alert;
class BrandController extends Controller
{
    const LIMITED_ROW =5; 
    public function index(Request $request, AntiXSS $antiXSS)
    {
        $data =[];
        $data['listBrands'] = DB::table('brands')
        ->paginate(self::LIMITED_ROW);
       
      
        return view('admin.brand.list',$data);
    }
    public function addBrand()
    {
        return view('admin.brand.add');
    }
    public function handleAddBrand(StoreBrandPost $request,AntiXSS $xss)
    {
        $nameBrand = $request->nameBrand;
        $nameBrand = $xss->xss_clean($nameBrand);
        $slug =Str::slug($nameBrand,'-');
        $descBrand = $request->descBrand;

        $insert = Brand::create([
            'name' => $nameBrand,
            'slug' => $slug,
            'description' => $descBrand,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
         ]);
 
         if($insert){
            Alert::success('Thêm thành công');
             return redirect(route('admin.brand'));
         } else {
            Alert::success('Thêm thành công');
             return redirect(route('admin.add.brand'));
         }
    }
    public function editBrand(Request $request)
    {
        $id = $request->id;
        $infoBrand = DB::table('brands')
                        ->where('id', $id)
                        ->first();
    
        if($infoBrand){
            return view('admin.brand.edit', compact('id', 'infoBrand'));
        } else {
            abort(404);
        } 
        
    }
    public function handleUpdate(UpdateStoreBrandPost $request)
    {
        $name = $request->nameBrand;
        $slug = Str::slug($name, '-');
        $des = $request->descBrand;
        $status= $request->status;
        $id = $request->hddIdBrand;
        $update = Brand::find($id)
                    ->update([
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $des ,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                ]);
        if($update){
            Alert::success('Sửa thành công');
            return redirect(route('admin.brand'));
        } else {
            Alert::error('Sửa Thất bại');
            return redirect(route('admin.edit.brand',['slug'=>$slug,'id' =>$id]));
        }

    } 
    
    public function deleteBrand($id)
    {
        $infoBrand = DB::table('brands')
            ->where('id', $id)
            ->delete();
        if($infoBrand){
            Alert::success('Xóa thành công');
            return redirect()->route('admin.brand');  
        }
        else{
            Alert::error('Xóa thất bại');
            return redirect()->route('admin.brand');  
        }
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $listBrands = Brand::where('name','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
        return view('admin.brand.list',compact('listBrands'));
    }
    
}

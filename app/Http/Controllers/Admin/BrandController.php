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
class BrandController extends Controller
{
    //const LIMITED_ROW =5; 
    public function index()
    {
        $listBrands= Brand::latest()->paginate(3);
        return view('admin.brand.list',compact('listBrands'));
    }
    public function addBrand()
    {
        return view('admin.brand.add');
    }
    public function handleAddBrand(StoreBrandPost $request,AntiXSS $xss)
    {
        //dd($request->all());
        $nameBrand = $request->nameBrand;
        $nameBrand = $xss->xss_clean($nameBrand);
        $slug =Str::slug($nameBrand,'-');
        $descBrand = $request->descBrand;

        $insert = DB::table('brands')->insert([
            'name' => $nameBrand,
            'slug' => $slug,
            'description' => $descBrand,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
         ]);
 
         if($insert){
             $request->session()->flash('success', 'Add successful');
             return redirect(route('admin.brand'));
         } else {
             $request->session()->flash('error', 'Add fail');
             return redirect(route('admin.add.brand'));
         }
    }
    public function editBrand(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBrand = DB::table('brands')
                        ->where('id', $id)
                        ->first();
        //$infoBrand = json_decode(json_encode($infoBrand), true);
    
        if($infoBrand){
            $message = $request->session()->get('brand');
            return view('admin.brand.edit', compact('id', 'infoBrand', 'message'));
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
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $update = DB::table('brands')
                    ->where('id', $id)
                    ->update([
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $des,
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
        if($update){
            $request->session()->flash('success', 'Update success');
            return redirect(route('admin.brand'));
        } else {
            $request->session()->flash('error', 'Update fail');
            return redirect(route('admin.edit.brand',['slug'=>$slug,'id' =>$id]));
        }

    } 
    
    public function deleteBrand(Request $request)
    {
        if($request->ajax()){
            // check la request ajax
            $idBrand = $request->id;
            $idBrand = (is_numeric($idBrand) && $idBrand > 0) ? $idBrand : 0;

            $status = $request->status;
            $status = $status === '0' || $status === '1' ? $status : '';

            if($idBrand != 0 && $status !== ''){
                $update = DB::table('brands')
                    ->where('id', $idBrand)
                    ->update(['status' => $status]);
                if($update){
                    echo 'ok';
                } else {
                    echo 'fail';
                }
            } else {
                echo 'err';
            }
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

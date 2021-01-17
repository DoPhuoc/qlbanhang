<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;
use Illuminate\Support\Str;
use voku\helper\AntiXSS;
use App\Http\Requests\StoreBannerPost as BannerPost;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreBannerPost;
class BannerController extends Controller
{
    public function index()
    {
        $banner=Banner::orderBy('id')->paginate(10);
        //dd($banner);
        return view('admin.banner.index')->with('banners',$banner);
    }
    public  function addBanner(Request $request)
    {
        $errLogo = $request->session()->get('errUploadBanner');
        return view('admin.banner.create');
    }
    public  function handleBanner(BannerPost $request,Banner $banner)
    {
        $titleBanner = $request->titleBanner;
        $slugBanner = Str::slug($titleBanner,'-');
        $desBanner = $request->desBanner;
        
        //upload file laravel
        $upload = false;
        $nameFile = null;
        if($request->hasFile('photoBanner')){
            if($request->file('photoBanner')->isValid()){
                $file = $request->file('photoBanner');
                $nameFile = $file->getClientOriginalName();
                $upload = $file->move('uploads/images/banners', $nameFile);
            }
        }
       
        if($upload && $nameFile){
            // tien hanh insert du lieu vao db
            $dataInsert = [
                'title' => $titleBanner,
                'slug' => $slugBanner,
                'photo' => $nameFile,
                'description' => $desBanner,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
            $insert = $banner->insertDataBanner($dataInsert);
            if($insert){
                $request->session()->flash('success', 'Them thanh cong');
                return redirect()->route('admin.banner');
            } else {
                // loi - van o lai form add brand
                $request->session()->flash('error', 'Them that bai');
                return redirect()->route('admin.add.banner');
            }
        } else {
            // khong upload dc file
            $request->session()->flash('errUploadBrand', 'Khong upload duoc logo thuong hieu');
            return redirect()->route('admin.add.banner');
        } 
    }
    public function editBanner($slug,$id){
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBanner = DB::table('banners')
                        ->where('id', $id)
                        ->first();
        //dd($infoBanner);
        if($infoBanner){
            return view('admin.banner.edit', compact('infoBanner'));
        } else {
            return view('admin.partials.not-found-page');
        }
    } 
    public function handleEditBanner(UpdateStoreBannerPost $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBanner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if($infoBanner) {
            $titleBanner = $request->titleBanner;
            $slugBanner = Str::slug($titleBanner, '-');
            $desBanner = $request->desBanner;
            $photoBanner = $infoBanner->photo; // anh truoc khi thay doi
            $status = $request->statusBanner;
            $uploadPhoto = null;
            $newPhoto = null;
            if($request->hasFile('photoBanner')) {
                if ($request->file('photoBanner')->isValid()) {
                    $file = $request->file('photoBanner');
                    $newPhoto = $file->getClientOriginalName();
                    $uploadPhoto = $file->move('uploads/images/banners', $newPhoto);
                }
            }
            //dd($uploadPhoto,$newPhoto);
            
            if($uploadPhoto && $newPhoto){
                // xoa anh cu cap nhap anh moi
                //unlink(public_path('uploads/images/brands') ."/".$logoBrand);
                $update = DB::table('banners')
                            ->where('id', $id)
                            ->update([
                                'title' => $titleBanner,
                                'slug' => $slugBanner,
                                'photo' => $newPhoto,
                                'description' => $desBanner,
                                'status' => $status,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
                           
            } else {
                // giu nguyen anh cu
                $update = DB::table('banners')
                    ->where('id', $id)
                    ->update([
                        'title' => $titleBanner,
                        'slug' => $slugBanner,
                        'photo' =>  $photoBanner,
                        'description' => $desBanner,
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
            }
            if($update){
                $request->session()->flash('success', 'Update thanh cong');
                return redirect()->route('admin.banner');
            } else {
                $request->session()->flash('errUpdateBrand', 'Update that bai cong');
                return redirect()->route('admin.edit.banner',['slug' => $infoBanner->slug, 'id' => $id]);
            }
        } else {
            return view('admin.partials.not-found-page');
        }
    } 
    
    public function deleteBanner($id)
    {
        $banner=Banner::find($id);
        $status=$banner->delete();
        if($banner){
            request()->session()->flash('success','Xóa thành công ');
        }
        else{
            request()->session()->flash('error','Xóa thất bại');
        }
        return redirect()->route('admin.banner');  
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;
use Illuminate\Support\Str; 
use App\Http\Requests\StoreBannerPost as BannerPost;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreBannerPost;
use RealRashid\SweetAlert\Facades\Alert;
class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::orderBy('id')->paginate(5); 
        //dd($banner);
        return view('admin.banner.index')->with('banners',$banners); 
    }
    //chức năng thêm 

    public  function addBanner(Request $request) //get
    {
        $errLogo = $request->session()->get('errUploadBanner');
        return view('admin.banner.create');
    }
    public  function handleBanner(BannerPost $request,Banner $banner) //post
    {
        
        $titleBanner = $request->titleBanner;
        $slugBanner = Str::slug($titleBanner,'-');
        $desBanner = $request->desBanner;
        $upload = false;
        $nameFile = null; 
         //Kiểm tra file
        if($request->hasFile('photoBanner')){
            if($request->file('photoBanner')->isValid()){
                $file = $request->file('photoBanner');
                $nameFile = $file->getClientOriginalName(); //lấy tên file
                $upload = $file->move('uploads/images/banners', $nameFile);//trả về đường dẫn file đấy
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
            //$insert = $banner->insertDataBanner($dataInsert);
            $insert = Banner::create($dataInsert); //chèn dữ liệu eloquent orm
            if($insert){
                Alert::success('Thêm thành công');
                return redirect()->route('admin.banner');
            } else {
                // loi - van o lai form add banner
                Alert::error('Thêm thất bại');
                return redirect()->route('admin.add.banner');
            }
        }else {
            // khong upload dc file
            $request->session()->flash('errUploadBanner', 'Không upload được file');
            return redirect()->route('admin.add.banner');
        }
    }
    //sửa 
    public function editBanner($slug,$id){ //get
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
    public function handleEditBanner(UpdateStoreBannerPost $request) //post
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBanner = DB::table('banners') //cách 1 querybuider
            ->where('id', $id)
            ->first();
        //dd($infoBanner);
        //cách 2 orm
        //$infoBanner = Banner::find($id);
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
              /*   $update = DB::table('banners')
                            ->where('id', $id)
                            ->update([
                                'title' => $titleBanner,
                                'slug' => $slugBanner,
                                'photo' => $newPhoto,
                                'description' => $desBanner,
                                'status' => $status,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]); */
                $update = Banner::find($id)
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
                Alert::success('Sửa thành công');
                return redirect()->route('admin.banner');
            } else {
                Alert::error('Sửa thất bại');
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
            Alert::success('Xóa thành công');
            return redirect()->route('admin.banner');  
        }
        else{
            Alert::error('Xóa thất bại');
            return redirect()->route('admin.banner');  
        }
       
    }
}

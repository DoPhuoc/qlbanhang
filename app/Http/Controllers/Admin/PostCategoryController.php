<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostCategories;
use App\Model\PostCategories;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUpdatePostCategories;
class PostCategoryController extends Controller
{
    public function index(){
        $postCategory =PostCategories::latest()->paginate(5);
        return view('admin.postCategory.list',compact('postCategory'));
    }
    public function getaddPostCategory(){
        
        return view('admin.postCategory.add');
    }
    public function postaddPostCategory(StorePostCategories $request){
        $title = $request->nameCate;
        $slug = Str::slug($title , '-');
        $descCate= $request->descCate;
        $status = $request->status;
        $dataInsert = PostCategories::create([
            'title' => $title,
            'slug' => $slug,
            'description' => $descCate,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
      
        if($dataInsert){
            Alert::success('Thêm thành công');
            return redirect()->route('admin.postCategory');
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('add.postCategory');
        }
    }
    public function geteditPostCategory($slug,$id){
        $postCategory = DB::table('post_categories')
        ->where('id', $id)
        ->first();
        return view('admin.postCategory.edit',compact('postCategory'));
    }
    public function posteditPostCategory(StoreUpdatePostCategories $request){
     
        $title = $request->nameCate;
        $slug = Str::slug($title , '-');
        $descCate= $request->descCate;
        $status = $request->status;
        $id = $request->hddIDCategory;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $update = DB::table('post_categories')
            ->where('id', $id)
            ->update([
            'title' => $title,
            'slug' => $slug,
            'description' => $descCate,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        if($update){
            Alert::success('Sửa thành công');
            return redirect()->route('admin.postCategory');
           
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.edit.postCategory');
        }

    }
    public function deletePostCategory($id)
    {
        $Category= PostCategories::find($id);
        $status=$Category->delete();
        if($Category){
            Alert::success('Xóa thành công');
            return redirect()->route('admin.postCategory');
        }
        else{
            Alert::success('Xóa thất bại');
            return redirect()->route('admin.postCategory');
        }
    }
    public function search(Request $request)
    {   
        $search = $request->get('search');
        $postCategory = PostCategories::where('title','like','%' . $search . '%')
        ->orWhere('description','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
       
        return view('admin.postCategory.list',compact('postCategory'));
    }
}

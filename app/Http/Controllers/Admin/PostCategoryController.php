<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostCategory;
use App\Http\Requests\StorePostCategory ;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateStorePostCategory;
use Illuminate\Support\Facades\DB;
class PostCategoryController extends Controller
{
    public function index(){
        $postCategory = PostCategory::all();
        return view('admin.postCategory.list',compact('postCategory'));
    }
    public function addPostCategory()
    {
        return view('admin.postCategory.add');
    }
    public function handleAddPostCategory(StorePostCategory $request)
    {
        //return $request->all();
        $title = $request->nameCate;
        $slug = Str::slug($title , '-');
        $descCate= $request->descCate;
        $status = $request->status;
        $dataInsert = PostCategory::create([
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
            return redirect()->route('admin.edit.postCategory');
        }
        /* if($dataInsert){
            $request->session()->flash('success', 'Them thanh cong');
        } else {
            $request->session()->flash('error', 'Them that bai');
        }
        return redirect(route('admin.postCategory')); */

    }
  /*   public function editPostCategory($id){
        $postCategory = PostCategory::find($id);
        return view('admin.postCategory.edit', compact('postCategory'));
    } */
    public function geteditPostCategory($slug,$id){
        $postCategory = DB::table('post_categories')
        ->where('id', $id)
        ->first();
        return view('admin.postCategory.edit',compact('postCategory'));
    }
    public function handleEditPostCategory(UpdateStorePostCategory $request){
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
            Alert::error('Sửa  thất bại');
            return redirect()->route('admin.edit.postCategory');
        }        
      
    }
    public function deletePostCategory($id)
    {
        $Category=PostCategory::find($id);
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

    public function search(Request $request){
        $search = $request->get('search');
        $postCategory = PostCategory::where('title','like','%'.'$search'.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('status','like','%'.$search.'%')
        ->paginate(5);

        return view('admin.postCategory.list',compact('postCategory'));
    }
}

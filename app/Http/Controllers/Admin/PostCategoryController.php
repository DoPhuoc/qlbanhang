<?php

namespace App\Http\Controllers\Admin;

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
            $request->session()->flash('success', 'Them thanh cong');
        } else {
            $request->session()->flash('error', 'Them that bai');
        }
        return redirect(route('admin.postCategory'));

    }
    public function editPostCategory($id){
        $postCategory = PostCategory::find($id);
        return view('admin.postCategory.edit', compact('postCategory'));
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
            $request->session()->flash('success', 'Sua thanh cong');
           
        } else {
            $request->session()->flash('error', 'Sua that bai');
        }
        return redirect(route('admin.postCategory'));
    }
    public function deletePostCategory($id)
    {
        $Category=PostCategory::find($id);
        $status=$Category->delete();
        if($Category){
            request()->session()->flash('success','Xóa thành công');
        }
        else{
            request()->session()->flash('error','Xóa thất bại');
        }
        return redirect()->route('admin.postCategory');  
    }
}

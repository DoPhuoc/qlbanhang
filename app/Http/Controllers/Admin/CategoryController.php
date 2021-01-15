<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Http\Requests\StoreCategoriesPost;
use App\Http\Requests\EditCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function index(){
        $categories= Categories::orderBy('id')->paginate(3);
        return view('admin.category.list',compact('categories'));
    }
    public function addCategory(){

        return view('admin.category.add');
    }
    public function handleCategory(StoreCategoriesPost $request){
        //return $request->all();

        $name = $request->nameCate;
        $slug = Str::slug($name, '-');
        $descCate= $request->descCate;
        $dataInsert = Categories::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $descCate,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        if($dataInsert){
            $request->session()->flash('success', 'Add success');
        } else {
            $request->session()->flash('error', 'Add Fail');
        }
        return redirect(route('admin.category'));
    }
    
    public function editCategory($slug,$id){
        $categories = DB::table('categories')
                        ->where('id', $id)
                        ->first();
        if($categories){
            return view('admin.category.edit', compact('id', 'categories'));
        } else {
            abort(404);
        }
    }
    public function handleEditCategory(EditCategories $request ){
        //return $request->all();
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $name = $request->nameCate;
        $slug = Str::slug($name, '-');
        $description = $request->descCate;
        $status= $request->status;
        $update = DB::table('categories')
                    ->where('id', $id)
                    ->update([
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $description,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                    ]);

        if($update){
            $request->session()->flash('success', 'Sửa thành công');
          
        } else {
            $request->session()->flash('error', 'Sửa thất bại');
            
        }
        return redirect(route('admin.category'));
    }
    public function deleteCategory($id)
    {
        $category=Categories::find($id);
        $category->delete();
        if($category){
            request()->session()->flash('success','Xóa thành công danh mục');
        }
        else{
            request()->session()->flash('error','Lỗi xóa');
        }
        return redirect()->route('admin.category');  
    }
 
}

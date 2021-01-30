<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests\StoreCategoriesPost;
use App\Http\Requests\EditCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        $categories= Category::orderBy('id')->paginate(5);
        return view('admin.category.list',compact('categories'));
    }
    public function create(){

        return view('admin.category.create');
    }
    public function store(StoreCategoriesPost $request){
        $name = $request->title;
        $slug = Str::slug($name, '-');
        $description= $request->description;
        $dataInsert = Category::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        if($dataInsert){
            $request->session()->flash('success', 'Thêm mới thành công');
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
        }
        return redirect(route('admin.category.index'));
    }
    public function edit($slug,$id){
        $categories = DB::table('categories')
                        ->where('id', $id)
                        ->first();
        if($categories){
            return view('admin.category.edit', compact('id', 'categories'));
        } else {
            abort(404);
        }
    }
    public function update(EditCategories $request ){
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $name = $request->title;
        $slug = Str::slug($name, '-');
        $description = $request->description;
        $status= $request->status;
        $update = DB::table('categories')
                    ->where('id', $id)
                    ->update([
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $description,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                    ]);

        if($update){
            $request->session()->flash('success', 'Thêm mới thành công');

        } else {
            $request->session()->flash('error', 'Thêm mới không thành công');

        }
        return redirect(route('admin.category.index'));
    }
        public function destroy(Category $category){
            if ($category->delete()) {
                Alert::success('Xóa thành công!');
            } else {
                Alert::error('Xóa không thành công');
            }
            return redirect()->route('admin.category.index');

        }

    public function search()
    {
        $categories = Category::where('name', 'like', '%' . request()->search . '%')
            ->get();
        return view('admin.category.list')->with('categories', $categories);
    }
}

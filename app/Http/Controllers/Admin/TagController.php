<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PostCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTagPost;
use App\Model\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreTagPost;
class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('admin.tags.list',compact('tags'));
    }
    public function addTag(){
        return view('admin.tags.add');
    }
    public function handleAddTag(StoreTagPost $request){
        //return $request->all();
        $titleTag = $request->titleTag;
        $slug = Str::slug($titleTag , '-');
        $descTag = $request->descTag;
        $status = $request->status;
        $dataInsert = Tag::create([
            'title' => $titleTag,
            'slug' => $slug,
            'description' => $descTag,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        //dd($dataInsert);
        if($dataInsert){
            $request->session()->flash('success', 'Thêm thành công');
        } else {
            $request->session()->flash('error', 'Thêm thất bại');
        }
        return redirect(route('admin.tag'));
    }
    public function editTag($slug,$id){
        $tag = DB::table('tags')
                        ->where('id', $id)
                        ->first();
        return view('admin.tags.edit',compact('tag'));
    }
    public function handleEditTag(UpdateStoreTagPost $request){
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $titleTag = $request->titleTag;
        $slug = Str::slug($titleTag , '-');
        $descTag = $request->descTag;
        $status = $request->status;
        $update = DB::table('tags')
                    ->where('id', $id)
                    ->update([
                        'title' => $titleTag,
                        'slug' => $slug,
                        'description' => $descTag,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                    ]);

        if($update){
            $request->session()->flash('success', 'Sửa thành công');

        } else {
            $request->session()->flash('error', 'Sửa thất bại');

        }
        return redirect(route('admin.tag'));
    }
    public function deleteTag($id)
    {
        $tag=Tag::find($id);
        $status=$tag->delete();
        if($tag){
            request()->session()->flash('success','Xoa thanh cong');
        }
        else{
            request()->session()->flash('error','Xoa that bai');
        }
        return redirect()->route('admin.tag');
    }
    public function search(Request $request){
        $search = $request->get('search');
        $tags = Tag::where('title','like','%'.'$search'.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->orWhere('status','like','%'.$search.'%')
            ->paginate(5);

        return view('admin.tags.list',compact('tags'));
    }
}

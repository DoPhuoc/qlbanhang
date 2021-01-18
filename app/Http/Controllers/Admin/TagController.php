<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTag;
use Illuminate\Support\Str;
use App\Model\Tag;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUpdateTag;
class TagController extends Controller
{
    public function index(){
        $tags=Tag::latest()->paginate(3);
        return view('admin.tags.list')->with('tags',$tags);
    }
    public function getaddTag(){

        return view('admin.tags.add');
    }
    public function postaddTag(StoreTag $request){
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
            Alert::success('Thêm thành công');
            return redirect()->route('admin.tag');
           
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.add.tag');
        }    
    }
    public function geteditTag($slug,$id){
        $tag = DB::table('tags')
                        ->where('id', $id)
                        ->first();
        return view('admin.tags.edit',compact('tag'));
    }
    public function posteditTag(StoreUpdateTag $request){
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
            Alert::success('Sửa thành công');
            return redirect()->route('admin.tag');
           
        } else {
            Alert::error('Sửa thất bại');
            return redirect()->route('admin.edit.tag');
        }    
    }
    public function deleteTag($id)
    {
        $tag=Tag::find($id);
        $status=$tag->delete();
        if($tag){
            Alert::success('Xóa thành công');
            return redirect()->route('admin.tag');
           
        } else {
            Alert::error('Xóa thất bại');
            return redirect()->route('admin.tag');
        }     
    }
    public function search(Request $request)
    {   
     
        $search = $request->get('search');
        $tags = Tag::where('title','like',
        '%' . $search . '%')
        ->orWhere('description','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
        
        return view('admin.tags.list',compact('tags'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePosts;
use App\Model\Posts;
use RealRashid\SweetAlert\Facades\Alert;
use App\Model\Tag;
use Illuminate\Support\Str;
use App\Model\PostCategories;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function index(){
        $posts=Posts::orderBy('id')->paginate(5);
        return view('admin.posts.list',compact('posts'));
    }
    public function getaddPosts(){
        $tags = Tag::where('status',1)->get();
        $catePosts  = PostCategories::where('status',1)->get();
        //dd($catePosts);
        return view('admin.posts.add',compact('tags','catePosts'));
    }
    public function handlePosts(StorePosts $request){
        $title = $request->title;
        $slug = Str::slug($title, '-');
        $summary = $request->summary;
        $description = $request->description;
        $quote=$request->quote;
        $status = $request->status;
        $tagPost = $request->tagPost;
        $catePost = $request->catePost;
       $arrImages = [];
       if($request->hasFile('images')){
           $image = $request->file('images');
           foreach ($image as $key => $i) {
               if($i->isValid()){
                   $nameImage = $i->getClientOriginalName();
                   $i->move('uploads/images/posts',$nameImage);
                   $arrImages[] = $nameImage;
               }
           }
       }

        $imagePost = array_pop($arrImages);
        $dataInsert = Posts::create([
                'title' => $title,
                'slug' => $slug,
                'summary' => $summary,
                'description' => $description,
                'quote' =>$quote,
                'image' => $imagePost,
                'status' => $status,
                'post_cat_id'=> $catePost,
                'post_tag_id'=>$tagPost,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
        ]);
        //dd($dataInsert);
        if($dataInsert){
            Alert::success('Thêm thành công');
            return redirect(route('admin.post'));
            
        } else {
            Alert::success('Thêm thành công');
            return redirect(route('admin.add.post'));
        }    
    } 

    public function geteditPosts($slud,$id){
        $tags = Tag::where('status',1)->get();
        $catePosts  = PostCategories::where('status',1)->get();
        $posts = DB::table('posts')
        ->where('id', $id)
        ->first();
        return view('admin.posts.edit',compact('tags','catePosts','posts'));
    }
    public function postEditPosts(StorePosts $request){
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoPosts = DB::table('posts')
            ->where('id', $id)
            ->first();
        if($infoPosts){
            $title = $request->title;
            $slug = Str::slug($title, '-');
            $summary = $request->summary;
            $description = $request->description;
            $quote=$request->quote;
            $status = $request->status;
            $tagPost = $request->tagPost;
            $catePost = $request->catePost;
            $imagePosts =$infoPosts->image;//lay du lieu anh truoc
            $uploadPhoto = [];
            $arrImages = [];
            if($request->hasFile('images')) {
                $image =$request->file('images');
                foreach($image as $key=>$i)
                if($i->isValid()) {
                    $newPhoto = $i->getClientOriginalName();
                    $uploadPhoto = $i->move('uploads/images/posts', $newPhoto);
                }
            }
            if($uploadPhoto && $newPhoto){
                $update = DB::table('posts')
                    ->where('id', $id)
                    ->update([
                        'title' => $title,
                        'slug' => $slug,
                        'summary' => $summary,
                        'description' => $description,
                        'quote' =>$quote,
                        'image' => $newPhoto,
                        'status' => $status,
                        'post_cat_id'=> $catePost,
                        'post_tag_id'=>$tagPost,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                        
                ]);
            }else{
                $update = DB::table('posts')
                ->where('id', $id)
                ->update([
                    'title' => $title,
                    'slug' => $slug,
                        'summary' => $summary,
                        'description' => $description,
                        'quote' =>$quote,
                        'image' => $imagePosts,
                        'status' => $status,
                        'post_cat_id'=> $catePost,
                        'post_tag_id'=>$tagPost,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
                        ]);
                    }
            if($update){
                Alert::success('Sửa thành công');
                return redirect(route('admin.post'));
                    } else {  
                Alert::success('Sửa thất bại');
                return redirect(route('admin.edit.post'));
                    }  
                }else{
                    return view('admin.partials.not-found-page');
                }         
        }
    public function deletePost($id)
        {
        $posts=Posts::find($id);
        $status=$posts->delete();
        if($posts){
            Alert::success('Xóa thành công');
            return redirect(route('admin.post'));
        }
        else{
            Alert::success('Xóa thất bại');
            return redirect(route('admin.post'));
        }
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Posts::where('title','like','%' . $search . '%')
        ->orWhere('description','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
        /* dd($categories); */
        return view('admin.posts.list',compact('posts'));
    }
   
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePosts;
use App\Model\Posts;
use Illuminate\Support\Str;
use App\Model\Tag;
use App\Model\PostCategory;
class PostController extends Controller
{
    public function index(){
        $posts=Posts::orderBy('id')->paginate(10);
        return view('admin.posts.list',compact('posts'));
    }
    public function addpost(){
        $tags = Tag::where('status',1)->get();
        $catePosts  = PostCategory::where('status',1)->get();
        //dd($postCategory);
        return view('admin.posts.add',compact('tags','catePosts'));
        
    }
    public function addPosts(StorePosts $request)
    {
        $title = $request->title;
        $slug = Str::slug($title, '-');
        $description = $request->description;
        $quote=$request->quote;
        $status = $request->status;
        $tagPost = $request->tagPost;
        $catePost = $request->catePost;
 
       $arrImages = [];
       //thuc hien upload file
       //kiem tra xem nguoi co chon file ko
       if($request->hasFile('images')){
           //Lay thong tin cua file
           $image = $request->file('images');
           
           foreach ($image as $key => $i) {
               //lay ra duoc ten file va duong dan luu tam thoi file
               if($i->isValid()){
                   $nameImage = $i->getClientOriginalName();
                   $i->move('uploads/images/posts',$nameImage);
                   $arrImages[] = $nameImage;
               }
           }
       }
       if($arrImages){
            $imagePost = array_pop($arrImages);
            $dataInsert = Posts::create([
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'quote' =>$quote,
                'image' => $imagePost,
                'status' => $status,
                'post_cat_id'=> $catePost,
                'post_tag_id'=>$tagPost,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
                ]);
       }
      
    //dd($dataInsert);
    if($dataInsert){
        $request->session()->flash('success', 'Them thanh cong');
    } else {
        $request->session()->flash('error', 'Them that bai');
    }
    return redirect(route('admin.posts'));
    } 

    public function editPost(){
        return view('admin.posts.edit');
    }
    public function deletePost($id)
    {
        $posts=Posts::find($id);
        $status=$posts->delete();
        if($posts){
            request()->session()->flash('success','Xoa thanh cong');
        }
        else{
            request()->session()->flash('error','Xoa that bai');
        }
        return redirect()->route('admin.posts');  
    }
}

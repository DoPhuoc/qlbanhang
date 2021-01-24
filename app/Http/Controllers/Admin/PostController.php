<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePosts;
use App\Http\Requests\StoreUpadtePosts;
use App\Model\Post;
use Illuminate\Support\Str;
use App\Model\Tag;
use App\Model\PostCategory;
use RealRashid\SweetAlert\Facades\Alert;
class PostController extends Controller
{
    public function index(){
        $posts=Post::orderBy('id')->paginate(10);
        return view('admin.posts.list',compact('posts'));
    }
    public function addpost(){
        $tags = Tag::where('status',1)->get();
        $catePosts  = PostCategory::where('status',1)->get();
        //dd($catePosts);
        return view('admin.posts.add',compact('tags','catePosts'));

    }
    public function handleAddPost(StorePosts $request)
    {
        $title = $request->title;
        $slug = Str::slug($title, '-');
        $description = $request->description;
        $quote=$request->quote;
        $status = $request->status;
        $tagPost = $request->tagPost;//Tag::where('id',$request->tagPost)->get();
        //dd($tagPost);
        //dd($tagPost[0]);

        $catePost = $request->catePost;#PostCategory::where('id',$request->catePost)->get('title');

        //$abc  = PostCategory::where('id',$catePost)->get('title');

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
            $dataInsert = Post::create([
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
    return redirect(route('admin.post'));
    }

    public function editPost($slud,$id){
        $tags = Tag::where('status',1)->get();
        $catePosts  = PostCategory::where('status',1)->get();
        $posts =Post::find($id);
        return view('admin.posts.edit',compact('tags','catePosts','posts'));
    }
    public function postPosts(Request $request){
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoPosts = DB::table('posts')
            ->where('id', $id)
            ->first();
        if($infoPosts){
            $title = $request->title;
            $slug = Str::slug($title, '-');
       
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
            }    
        }
    public function deletePost($id)
    {
        $posts=Post::find($id);
        $status=$posts->delete();
        if($posts){
            request()->session()->flash('success','Xoa thanh cong');
        }
        else{
            request()->session()->flash('error','Xoa that bai');
        }
        return redirect()->route('admin.post');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title','like','%' . $search . '%')
        ->orWhere('description','like','%' . $search . '%')
        ->orWhere('status','like','%' . $search . '%')
        ->paginate(5);
        /* dd($categories); */
        return view('admin.posts.list',compact('posts'));
    }
}

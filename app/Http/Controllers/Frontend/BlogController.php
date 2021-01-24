<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Tag;
use App\Model\PostCategory;
class BlogController extends Controller
{
   /*  public function getBlogBelongPostCategory(){
        $blogs = PostCategory::findOrFail(request()->id)->blogs;
        return view(
            'frontend.list',
            [
                'blogs' => $blogs
            ]
        );
    } */

    public function blog(){
       /*  $selectedBlog = Post::findOrFail(request()->id);
        $relatedTag = Tag::findOrFail($selectedBlog->post_tag_id)
        ->except(['id' => $selectedBlog->id]);
        $relatedPostCategory = Tag::findOrFail($selectedBlog->post_cat_id)
        ->except(['id' => $selectedPostCategory->id]); */
        return view('frontend.blog.blog',/* [
            'posts' => $selectedBlog,
            'relatedTag'=>$relatedTag,
            'relatedPostCategory'=>$selectedPostCategory
        ] */);
    }
    public function blogDetail(){
        return view('frontend.blog.blog-detail');
    }
}

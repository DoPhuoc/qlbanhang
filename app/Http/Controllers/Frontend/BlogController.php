<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostCategory;
class BlogController extends Controller
{
    public function getBlogBelongPostCategory(){
        $blogs = PostCategory::findOrFail(request()->id)->blogs;
        return view(
            'frontend..list',
            [
                'blogs' => $blogs
            ]
        );
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-30days'));
        $pagination = request()->pagination ?? config('app.pagination');
        $orderType = request()->order_type ?? '';
        $posts = Post::where('status', Product::ACTIVE)
            ->whereBetween('created_at', [$yesterday, $today]);
        if ($orderType) {
            $posts->orderBy('price', $orderType);
        }
        $posts = $posts->paginate($pagination);
        return view('frontend.posts.list', compact('posts'));
    }

    public function show()
    {
        $post = Post::findOrFail(request()->id);
        return view('frontend.posts.show', compact('post'));
    }
}

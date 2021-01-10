<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.posts.list');
    }
    public function addPost(){
        return view('admin.posts.add');
    }
    public function editPost(){
        return view('admin.posts.edit');
    }
}

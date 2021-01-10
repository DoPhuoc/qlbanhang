<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(){
        return view('admin.postCategory.list');
    }
    public function addPostCategory(){
        return view('admin.postCategory.add');
    }
    public function editPostCategory(){
        return view('admin.postCategory.edit');
    }
}

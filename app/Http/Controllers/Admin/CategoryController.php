<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.list');
    }
    public function addCategory(){
        return view('admin.category.add');
    }
    public function editCategory(){
        return view('admin.category.edit');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('admin.tags.list');
    }
    public function addTag(){
        return view('admin.tags.add');
    }
    public function editTag(){
        return view('admin.tags.edit');
    }
}

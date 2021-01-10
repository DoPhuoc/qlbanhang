<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('admin.users.list');
    }
    public function addUsers(){
        return view('admin.users.add');
    }
    public function editUsers(){
        return view('admin.users.edit');
    }
}


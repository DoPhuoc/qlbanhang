<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('admin.order.list');
    }
    public function addShipping(){
        return view('admin.order.add');
    }
    public function editShipping(){
        return view('admin.order.edit');
    }
}

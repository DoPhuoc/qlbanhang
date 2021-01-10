<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index(){
        return view('admin.shipping.list');
    }
    public function addShipping(){
        return view('admin.shipping.add');
    }
    public function editShipping(){
        return view('admin.shipping.edit');
    }
}

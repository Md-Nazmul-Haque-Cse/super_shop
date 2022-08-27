<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Outlet;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.home.home',[
            'users' => Customer::orderBy('id' , 'desc')->get(),
            'outlets' => Outlet::orderBy('id' , 'desc')->get()
        ]);
    }
}

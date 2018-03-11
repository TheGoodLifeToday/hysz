<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //显示首页
    function index()
    {
    	return view('index.index');
    }
}

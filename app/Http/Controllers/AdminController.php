<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class AdminController extends Controller
{
    //
    function index()
    {
    	$admin = new Admin;
    	$admin_info = $admin->get();

    	return view('admin.index',compact('admin_info'));
    }

    //添加管理员
    function addAdmin()
    {
    	return view('admin.addAdmin');
    }
    //操作数据
    function doAddAdmin(Request $request)
    {

    	$data = $request->except('_token');
    	$rules = [
    		'name' => 'bail|required',
    		'password' => 'bail|required|alpha_dash|between:6,32',
    		'password2' => 'bail|required|alpha_dash|between:6,32',
    	];
    	$message = [
    		'name.required' => '用户名不能为空',
    		'password.required' => '密码不能为空',
    		'password.alpha_dash' => '密码有数字字母下划线组成',
    		'password.between' => '密码长度为6~32位',
    		'password2.required' => '密码输入不一致',
    		'password2.alpha_dash' => '密码输入不一致',
    		'password2.between' => '密码输入不一致',
    	];
    	$validator = Validator::make($data,$rules,$message);
    	if($validator->fails()){
    		return redirect('admin/addAdmin')
                        ->withErrors($validator)
                        ->withInput();
    	}else{
    		$admin = new Admin;
    		$admin_info = $admin->where('name',$data['name'])->first();
    		if(empty($admin_info->name)){
    			$admin->name = $data['name'];
	    		$admin->password = Hash::make($data['password']);
	    		$res = $admin->save();
	    		if($res){
	    			return redirect('admin/addAdmin')
	    						->with('status','添加成功');
	    		}
    		}else{
    			return redirect('admin/addAdmin')->with('status','用户已存在');
    		}
    		
    	}
    }

}

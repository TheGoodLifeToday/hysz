<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //显示登录页面
    function login()
    {
    	if(session('admin')){
    		return redirect('/');
    	}
    	return view('login.login');
    }
    //操作登录数据
    function doLogin(Request $request)
    {
    	$data = $request->except('_token');
        $rules = [
        	'code' => 'required|captcha',
    		'name' => 'bail|required',
    		'password' => 'bail|required|alpha_dash|between:6,32',
    	];
    	$message = [
    		'name.required' => '用户名不能为空',
    		'password.required' => '密码不能为空',
    		'password.alpha_dash' => '密码有数字字母下划线组成',
    		'password.between' => '密码长度为6~32位',
    		'code' => '验证码不正确',
    	];
        $validator = Validator::make($data, $rules,$message);
        if ($validator->fails())
        {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }     
      	$admin = new Admin;
      	$admin_info = $admin->where('name',$data['name'])->first();
      	if(!empty($admin_info)){
      		if(Hash::check($data['password'],$admin_info->password)){
      			session(['admin'=>$admin_info]);
      			return redirect('/');
      		}else{
      			return back()->with('res','密码不正确');
      		}
      	}else{
      		return back()->with('res','此用户不存在，请先注册');
      	}   	
    }

    //退出登录
    function outLogin()
    {
    	session(['admin'=>null]);

    	return redirect('login');
    }


}

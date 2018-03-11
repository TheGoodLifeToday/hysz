<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Goods;
use App\Models\Detail;
use App\Models\user_log;

class UsersController extends Controller
{
    //

    private $User;
    private $Goods;
    private $Detail;
    private $user_log;

    public function __construct(){
        $this->User = new User;
        $this->Goods = new Goods;
        $this->Detail = new Detail;
        $this->user_log = new user_log; 
    }
    function userList()
    {
    	$user = new User;
    	$user_info = $user->get();
    	$detail = new Detail;
    	$detail_info = $detail->get();

    	return view('user.index',compact('user_info','detail_info'));
    }

    function addUser()
    {
		$goods = new Goods;
		$goods_info = $goods->get();
    	return view('user.addUser',compact('goods_info'));
    }

    function doAddUser(Request $request)
    {
    	$data = $request->except('_token');
    	$user = new User;
    	$user->name = $data['name'];
    	$user->address = $data['address'];
    	$user->phone = $data['phone'];
    	$user->is_vip = $data['is_vip'];
    	$res = $user->save();
    	$detail = new Detail;
    	$detail->uid = $user->id;
    	$detail->goods_id = $data['type'];
    	$detail->foregift = $data['foregift'];
    	$detail->stock_balance = $data['stock_balance'];
    	$detail->comment = $data['comment'];
    	$res1 = $detail->save();
    	if($res == $res1){
    		return back()->with('status','添加成功');
    	}else{
    		return back()->with('status','添加失败')->withInput();
    	}
    }

    public function destroy($id)
    {
    	$user = new User;
    	$data = [];
        $re =  $user->find($id)->delete();
//        删除成功
        if($re){
            $data['status']= 0;
            $data['msg']='删除成功';
        }else{
            $data['status']= 1;
            $data['msg']='删除失败';
        }
        return $data;
    } 
    //修改用户
    public function edit($id)
    {
    	$user = new User;
    	$detail = new Detail;
    	$goods = new Goods;

    	$user_info = $user->find($id);
    	$detail_info = $detail->where('uid',$id)->first();
    	$goods_info = $goods->get();
    	return view('user.editUser',compact('user_info','detail_info','goods_info'));
    }

    //更新用户信息
    public function update(Request $request,$id)
    {
    	$data = $request->except('_token','_mothod');
    	$user = \App\Models\User::find($id);
    	$user->name = $data['name'];
    	$user->address = $data['address'];
    	$user->phone = $data['phone'];
    	$user->is_vip = $data['is_vip'];
    	$res = $user->save();
    	$detail = new Detail;
    	$res1 = $detail->where('uid',$id)->update(['goods_id' => $data['type'],'foregift' => $data['foregift'],'num' => $data['num'],'comment' => $data['comment']]);
    	if($res == $res1){
    		return back()->with('status','修改成功');
    	}else{
    		return back()->with('status','修改失败')->withInput();
    	}
    }
    //用户详情
    public function show($id)
    {
    	$user = new User;
    	$detail = new Detail;
    	$goods = new Goods;
    	$user_log = new User_log;
    	$detail_info = $detail->find($id);

    	$user_info = $user->find($id);
    	$goods_info = $goods->where('id',$detail_info->goods_id)->first();

    	$user_log_info = $user_log->where('uid',$id)->where('status',1)->get();
    	return view('user.showUser',compact('user_info','detail_info','goods_info','user_log_info'));
    }

    //操作库存,编写日志
    public function getGoods(Request $request)
    {
    	$data = $request->except('_token');
    	$user_log = new User_log;
    	$goods = new Goods;
    	$detail = new Detail;
    	$user_log->content = $data['name'].','.$data['is_vip'].','.'要水';
    	$user_log->address = $data['address'];
    	$user_log->num = $data['num'];
    	$user_log->stock_balance = $data['stock_balance']-$data['num'];
    	$user_log->type = $data['type'];
    	$user_log->uid = $data['id'];
        $user_log->status = 1;
    	$res = $user_log->save();
    	$detail_info = $detail->where('uid',$data['id'])->first();
    	$res1 = $detail->where('uid',$data['id'])->update(['stock_balance' => $data['stock_balance']-$data['num']]);
        $goods_info = $goods->where('id',$detail_info->goods_id)->first();
    	$res2 = $goods->where('id',$detail_info->goods_id)->update(['stock_balance' => $goods_info->stock_balance-$data['num'],'empty_barrel' => $goods_info->empty_barrel+$data['num']]);

    	if($res){
    		return redirect('userList');
    	}else{
    		return back()->with('status','添加失败')->withInput();
    	}
    }

    public function getUser(Request $request,$id)
    {
        return $request->all();
        // $user = User::find($id);
        // return $user;
    }
    public function preOrder($id)
    {
        $user_info = $this->User->find($id);
        $detail_info = $this->Detail->where('uid',$id)->first();
        $goods_info = $this->Goods->get();
        $user_log = new User_log;
        $user_log_info = $user_log->user_log(2);
        return view('user.preOrder',compact('user_info','detail_info','goods_info','user_log_info'));
    }
    public function doPreOrder(Request $request)
    {
        $data = $request->except('_token');
        $goods = new Goods;
        $goods_info = $goods->find($data['type']);
        $detail = \App\Models\Detail::where('uid',$data['id'])->first();
        $detail->stock_balance = $detail->stock_balance + $data['preOrder'];
        $res = $detail->save();
        $user_log = new User_log;
        $user_log->content = $data['name'].'--'.'预购';
        $user_log->address = $data['address'];
        $user_log->num = $data['preOrder'];
        $user_log->stock_balance = $detail->stock_balance;
        $user_log->price = $data['price'];
        $user_log->type = $goods_info->name.'--'.$goods_info->type;
        $user_log->uid = $data['id'];
        $user_log->status = 2;
        $user_log->remarks = $data['remarks'];
        $res = $user_log->save();
        if($res){
            return back()->with('status','预购成功');
        }else{
            return back()->with('status','预购失败')->withInput();
        }
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Supplier;
use App\Models\Admin_log;

class GoodsController extends Controller
{

    /**
     * 
     * @var object
     */
    private $goods;
    private $supplier;
    private $admin_log;
    /**
     * 构造函数
     *
     * @return viod [<description>]
     */
    public function __construct(){
        $this->goods = new Goods;
        $this->supplier = new Supplier;
        $this->admin_log = new Admin_log;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $goods = new Goods;
        $goods_info = $goods->get();
        $supplier = new Supplier;
        $supplier_info = $supplier->get();
        return view('goods.index',compact('goods_info','supplier_info'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $supplier = new Supplier;
        $supplier_info = $supplier->get();
        return view('goods.create',compact("supplier_info"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');

        $goods = new Goods;
        $goods->name = $data['name'];
        $goods->type = $data['type'];
        $goods->cost_price = $data['cost_price'];
        $goods->price = $data['price'];
        $goods->vip_price = $data['vip_price'];
        $goods->stock_balance = $data['stock_balance'];
        $goods->supplier_id = $data['supplier_id'];
        $res = $goods->save();
        if($res){
            return back()->with('status','添加成功');
        }else{
            return back()->with('status','添加失败')->withInput();
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $goods_info = $this->goods->find($id);
        $supplier_info = $this->supplier->get();
        $admin_log_info = $this->admin_log->where('goods_id',$id)->get();
        return view('goods.show',compact('goods_info','supplier_info','admin_log_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $goods_info = $this->goods->find($id);
        $supplier_info = $this->supplier->get();
        return view('goods.editGoods',compact('goods_info','supplier_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token','_method');
        $goods = \App\Models\Goods::find($id);
        $goods->name = $data['name'];
        $goods->type = $data['type'];
        $goods->cost_price = $data['cost_price'];
        $goods->price = $data['price'];
        $goods->vip_price = $data['vip_price'];
        $goods->stock_balance = $data['stock_balance'];
        $goods->supplier_id = $data['supplier_id'];
        $res = $goods->save();
        if($res){
            return back()->with('status','修改成功');
        }else{
            return back()->with('status','修改失败')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $goods = new Goods;
        $data = [];
        $re =  $goods->find($id)->delete();
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

    //进货
    public function addGoods(Request $request){
        
        $data = $request->except('_token');
        $goods = \App\Models\Goods::find($data['id']);
        $goods->stock_balance = $goods->stock_balance + $data['addGoods'];
        $res = $goods->save();
        $this->admin_log->content = session('admin')->name.'--'.'进水';
        $this->admin_log->price = $data['price'];
        $this->admin_log->admin_id = session('admin')->id;
        $this->admin_log->supplier_id = $data['supplier_id'];
        $this->admin_log->num = $data['addGoods'];
        $this->admin_log->goods_id = $data['id'];
        $this->admin_log->type = $data['type'];
        $this->admin_log->save();

        if($res){
            return back()->with('status','添加成功');
        }else{
            return back()->with('status','添加失败')->withInput();
        }
    }
}

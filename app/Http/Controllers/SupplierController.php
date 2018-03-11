<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = new Supplier;
        $supplier_info = $supplier->get();
        return view('supplier.index',compact('supplier_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier.create');
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
        $supplier = new Supplier;
        $supplier->name = $data['name'];
        $supplier->phone = $data['phone'];
        $supplier->company = $data['company'];
        $supplier->goods_type = $data['goods_type'];
        $res = $supplier->save();
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
        $supplier = new Supplier;
        $supplier_info = $supplier->find($id);
        return view('supplier.edit',compact('supplier_info'));
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
        $supplier = new Supplier;
        $res = $supplier->where('id',$id)->update(['name'=>$data['name'],'company' => $data['company'] ,'phone' => $data['phone'],'goods_type' => $data['goods_type']]);
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
        $supplier = new supplier;
        $data = [];
        $re =  $supplier->find($id)->delete();
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
}

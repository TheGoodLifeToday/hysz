@extends('layout.layout')
@section('content')
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>商品列表</h2>
        <!-- <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul> -->
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable-keytable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>姓名</th>
                    <th>种类</th>
                    <th>成本价</th>
                    <th>普通会员价</th>
                    <th>会员价</th>	
                    <th>库存</th>
                    <th>供应商</th>
                    <th>进货时间</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($goods_info as $value)
                      <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->type }}</td>
                        <td>{{ $value->cost_price }}</td>
                       	<td>{{ $value->price }}</td>
                        <td>{{ $value->vip_price }}</td>                       
                        <td>{{ $value->stock_balance }}</td>                       
                        <td>@foreach($supplier_info as $v) @if($v->id == $value->supplier_id) {{ $v->company.','.$v->name.','.$v->goods_type }} @endif @endforeach</td>
                        <td>{{ $value->created_at }}</td>                       
                        <td>
                            <a href=" /goods/{{$value->id}}/edit " class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 修改 </a>
                            <a href=" /goods/{{$value->id}} " class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 进货 </a>                          
                            <a href="javascript:void(0)" onclick="del({{$value->id}})">
							<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除</button>

						</td>
						</a>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>

    function del(id){

        layer.confirm('是否确认删除？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            //            jQuery.post(url,data,success(data, textStatus, jqXHR),dataType)
            $.post('{{url('goods')}}/'+id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                //console.log(data);
//                    删除成功
                if(data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                    location.href = location.href;
                }else{
                    layer.msg(data.msg, {icon: 5});
                    location.href = location.href;
                }
            });

        }, function(){

        });
    }

</script>
@endsection
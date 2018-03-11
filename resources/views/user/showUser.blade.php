@extends('layout.layout')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>用户管理</h3>
      </div>

      <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                  </span>
          </div>
        </div> -->
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>下单购买</small></h2>

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
           @if(session('status'))
				<div class="alert alert-success" onclick="show(this)">
					<ul>
						<li>
							{{ session('status') }}
						</li>
					</ul>
				</div>
			@endif
			<script type="text/javascript">
				
				function show(data)
				{
					$(data).css('display','none');
				}
			</script>
          <div class="x_content">

            <form class="form-horizontal form-label-left" action="{{ url('getGoods') }}" method="post">
            	{{ csrf_field() }}
               <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">姓名 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required" type="text" value="{{ $user_info->name }}" readonly="trun">
                  <input type="hidden" name="id" value="{{ $user_info->id }}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">电话 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user_info->phone }}" readonly="trun">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">地址 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="address"  required="required" class="form-control col-md-7 col-xs-12" value="{{ $user_info->address }}" readonly="trun">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">水的种类</label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                	<input type="text"  name="type"  required="required" class="form-control col-md-7 col-xs-12" value="{{ $goods_info->type }}" readonly="trun">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">用户类型</label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                	<input type="text"  name="is_vip"  required="required" class="form-control col-md-7 col-xs-12" value="@if ($user_info->is_vip) 会员用户 @else 临时用户 @endif" readonly="trun">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">押金方式</label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                	<input type="text"  name="address"  required="required" class="form-control col-md-7 col-xs-12" value="@if ($detail_info->foregift) 水桶 @else 现金 @endif" readonly="trun">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">库存 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="occupation" type="text" name="stock_balance" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" value="{{ $detail_info->stock_balance }}" readonly="trun">
                </div>
              </div> 
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">购买数量 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="occupation" type="text" name="num" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" value="" required="required">
                </div>
              </div>              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">备注 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="textarea" name="comment" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">取消</button>
                  <input type="submit" class="btn btn-success" value="提交">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    
  
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <h2>购水日志</small></h2>
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
	    
	    <table id="datatable" class="table table-striped table-bordered">
	      <thead>
	        <tr>
	          
	          <th>内容</th>
	          <th>地址</th>
	          <th>种类</th>
	          <th>购买数量</th>
	          <th>时间</th>
	          <th>库存</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($user_log_info as $value)
		        <tr>
		          <td>{{ $value->content }}</td>
		          <td>{{ $value->address }}</td>
		          <td>{{ $value->type }}</td>
		          <td>{{ $value->num }}</td>
		          <td>{{ $value->created_at }}</td>
		          <td>{{ $value->stock_balance }}</td>	          
		        </tr>
		    @endforeach
	      </tbody>
	    </table>
	  </div>
	</div>
</div>
</div>
</div>
@endsection
@extends('layout.layout')

@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>管理员管理</h3>
                @if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				@if(session('status'))
					<div class="alert alert-success">
						<ul>
							<li>
								{{ session('status') }}
							</li>
						</ul>
					</div>
				@endif
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                    </ul>
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="{{ url('admin/doAddAdmin') }}" method="post">

                    	{{ csrf_field() }}

                      <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                      </p> -->
                      <span class="section">添加管理员</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">用户名 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="用户名" required="required" type="text" value="{{ old('name') }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">密码<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" placeholder="密码">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">确认密码<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required" placeholder="确认密码">
                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">取消</button>
                          <input type="submit" class="btn btn-success" value="提交">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
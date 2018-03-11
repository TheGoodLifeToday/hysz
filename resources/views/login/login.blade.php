<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>恒源水站登录</title>
    <link rel="icon" href="/admin/images/img.jpg" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ url('doLogin') }}" method="post" >
              {{ csrf_field() }}
              <h1>登录</h1>
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(session('res'))
                <div class="alert alert-success">
                  <ul>
                    <li>
                      {{ session('res') }}
                    </li>
                  </ul>
                </div>
              @endif
              <div>
                <input type="text" name="name" class="form-control" placeholder="用户名" required="" value="{{ old('name') }}" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="密码" required="" />
              </div>
              <div>
                <input type="text" name="code"  class="form-control" style="width:150px; display: inline;margin-right: 40px" placeholder="验证码" required="" />
                <img src="{{ captcha_src() }}"" onclick="this.src=this.src+'?a='+Math.random()" >
              </div>

              <div>
                <input type="submit" class="btn btn-default submit" style="margin-left: 150px" value="登录">
              </div>

              <div class="clearfix"></div>

              <div class="separator"> 

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-tint"></i>&nbsp; 恒源水站</h1>
                  <p>©2018 All Rights Reserved. Hengyuan water station!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

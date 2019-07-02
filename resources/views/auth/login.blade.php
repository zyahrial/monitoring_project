<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link href="/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/assets/NiceAdmin/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">
           @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    <div class="login-form" style="width: 25%" >
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
       <div class="input-group">
         <form method="POST" action="{{ route('login') }}">
                        @csrf
         <label for="username" class="sr-only">Email</label>
  <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        <br>
              <label for="password" class="sr-only">Password</label>
         <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            <div align="center">
            </div>
        <!-- /.col -->
        <div class="col-xs-4">
         <button type="submit" class="btn btn-primary"> {{ __('Login') }}  </button>
        </div>
        <!-- /.col -->
      </div>
          <div align="center">
              <label>
    <a href="{{ URL('/register') }}" > Register</a>
                  </label>
            </div>
    </form>
    <div class="text-right">
      <div class="credits">
        </div>
    </div>
  </div>

    <!-- jQuery-->
    <script src="/NiceAdmin/js/jquery.js"></script>
    <!-- Bootsrap -->
    <script src="/NiceAdmin/js/bootstrap.min.js"></script>
</body>

</html>

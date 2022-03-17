<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Novatele</title>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="hold-transition login-page">
  <div id="app">
    <div class="login-box">
      <div class="login-logo">
        <span>NovaTele <b>API</b></span>
      </div> 
      <div class="login-box-body">   
        <h2 style="margin-top: 5px;" class="text-center">Login</h2>
          
        <form method="POST" action="{{route('login')}}">
          {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-mail usuário</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8"></div>       
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div>        
          </div>
        </form>
          
      </div>
      <span>
        @if ($errors->has('password'))
          <span class="help-error">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </span>
    </div>
  </div>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

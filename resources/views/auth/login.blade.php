<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="Login-page" style=" text-align:center; width:43%; margin:80px auto; background-color: #AEBBDB; padding:20px">
    <div class="text-align:center">
    <div class="container" style="">
        <h4>Login Page</h4><hr>
        
        <form action="{{route('login-user')}}" method= "post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
          @csrf
            <div class="form-group">
                <label for="email">E-mail: </label>
                <input type="text" class="form" placeholder="Enter Email" name="email" value="{{old('email')}}"><br>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>

<br>
                <label for="password">Password: </label>
                <input type="password" class="form" placeholder="Enter Password" name="password" value=""><br>
                <span class="text-danger">@error('password') {{$message}} @enderror</span>

<br>


</div>
<button class="btn btn-block btn-primary" type="submit">Login</button>
            </div>
            <br>
            <!-- <a href="forgot-password">Forgot Password!</a><br> -->
            <!-- here registration is the url, when click here it goes on registration page -->
            <a href="registration">New User!! Registration Here</a>
        </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
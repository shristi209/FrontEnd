<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="registration-page" style="width:43%; margin:80px auto; background-color: #AEBBDB; padding:20px">

    <div class="container" style="margin:20px">
        <h4>Sign-Up </h4><hr>
        <!-- The action attribute specifies the URL where the form data should be submitted, and the method attribute specifies the HTTP method to be used for the form submission. -->
        <form action="{{route('register-user')}}" method="post">
        <!-- action="{{route('register-user')}}" specifies that the form data should be submitted to the registerUser method in a controller using the POST method. -->
            <!-- this below two are created to show alert message to the user, this is brought form the authenticationcontroller named success -->
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <!-- we need to use cserf token for the security purpose -->
            @csrf
            <div class="form-group">
                <label for="name">Full Name: </label>
                <input type="text" class="form" placeholder="Enter Full Name" name="name" value="{{old('name')}}"><br>
                <!-- holding old value when registering -->
                <!-- Laravel Blade templates to display form validation errors next to form fields. for this validate and write here -->
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
<br>
                <label for="email">E-mail: </label>
                <input type="text" class="form" placeholder="Enter Email" name="email" value="{{old('email')}}"><br>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>

<br>
                <label for="password">Password: </label>
                <input type="password" class="form" placeholder="Enter Password" name="password" value=""><br>
                <span class="text-danger">@error('password') {{$message}} @enderror</span>

<br>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Register</button>
            </div>
            <br>
            <a href="login">Already Registered!! Login here</a>
        </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style-regist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Register</title>
</head>
<body style="background-color:rgba(255,215,0,0.3)">
<div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-2">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.home') }}">Perpus .Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              {{-- div yg di bawah ini buat space between --}}
              <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  
                </div>
                <div class="navbar-nav">
                  <a class="nav-link active font-weight-bold" href="{{ route('login.login') }}">Log in</a>
                  <a class="nav-link active font-weight-bold" href="{{ route('register.regis') }}">Register</a>
                </div>
              </div>
          </div>
        </nav>
      </div>
    <div class="login-page">
        <div class="form">
          <div class="notif">
            @if (session('error'))
          {{ session('error') }} 
           @endif
          @if (session('success'))
          {{ session('success') }}
          @endif
          </div>
          
          <form action="{{ route('register.simpan') }}" method="POST" class="login-form">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email"/>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="username"/>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="name"/>
            <input type="password" name="password" id="myInput" value="{{ old('password') }}" placeholder="password"/>
            <div class="container-show">
              <input type="checkbox" style="width: 20px" onclick="myFunction()">
              <p>show password</p>
            </div>
            <button type="submit" value="simpan">create</button>
            <p class="message">Already Register? <a href="{{ route('login.login') }}">Just Login dumbass</a></p>
          </form>
        </div>
      </div>

      <script src="{{ asset('index.js') }}"></script>
</body>
</html>
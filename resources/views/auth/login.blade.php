<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }} | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .login-container {
      display: flex;
      align-items: center;
      height: 100vh;
    }

    .login-background {
      flex: 2;
      width: 100%;
      height: 100%;
      background-image: url('https://miro.medium.com/v2/resize:fit:1440/format:webp/1*SHTjic9tOhTFGSco7USwIQ.jpeg');
      background-size: cover;
      background-position: center;
    }

    .login-form {
      flex: 1;
      padding: 40px;
    }
  </style>
</head>
<body>
  <div class="container-fluid row login-container">
    <div class="login-background"></div>
    <div class="login-form">
      <h2>Login</h2>
      <form action="{{ route('auth.post-login') }}" method="POST">
        @csrf
        <div class="form-group my-3">
          <label for="username">Username</label>
          <input type="username" id="username" name="username" placeholder="Masukkan username..." class="form-control mt-2">
        </div>
        <div class="form-group my-3">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password..." class="form-control mt-2">
        </div>
        <button type="submit" class="my-3 form-control btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
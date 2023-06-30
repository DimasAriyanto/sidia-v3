<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }} | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .login-container {
      height: 100vh;
    }

    .login-background {
      position: relative;
      flex: 2;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4)
    }

    .login-background::before {
      position: absolute;
      z-index: -1;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      content: "";
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
    <div class="login-background py-2">
      <div class="d-flex align-items-end h-100 p-5">
        <div class="py-4">
          <p class="text-center text-white fw-light fs-5 px-5 py-2">“Inaction breeds doubt and fear. Action breeds
            confidence
            and
            courage. If you want to
            conquer fear, do not sit home and think about it. Go out and get busy.”</p>
          <p class="text-center text-white fw-bold fs-6 mb-5">
            Dale Carnegie
          </p>
          <p class="text-center text-white fw-lighter fs-6 mt-5">
            ©2023 | Sistem Informasi Persediaan Barang (SIDIA)
          </p>
        </div>
      </div>
    </div>
    <div class="login-form py-6">
      <hr style="opacity: 0.1">
      <div class="text-center my-5">
        <img src="{{ asset('logo/sidia-color.png') }}" width="200px" class="mb-5" alt="{{ env('APP_NAME') }}">
        <hr style="opacity: 0.1">
      </div>
      <h2 class="mb-4 fw-lighter">Welcome to Login Page</h2>
      @error('error')
        <div class="mt-2 alert alert-danger">{{ $message }}</div>
      @enderror
      <form action="{{ route('auth.post-login') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label class="fw-normal" for="username">Username</label>
          <input type="username" id="username" name="username" placeholder="Masukkan username..."
            class="form-control fw-light mt-2 @error('username') is-invalid @enderror">
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label class="fw-normal" for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password..."
            class="form-control fw-light mt-2 @error('password') is-invalid @enderror">
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
          <label class="fw-light" class="form-check-label text-secondary font-weight-light" for="remember-me">Remember me</label>
        </div>
        <button type="submit" class="mb-3 form-control fw-light btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</body>

</html>

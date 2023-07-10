<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }} | {{ @$title }} </title>
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  <style>
    body {
      min-height: 100vh;
    }

    main {
      height: 100vh;
      max-height: 100vh;
      overflow-x: auto;
    }

    @media only screen and (min-width: 1900px) {
      .sidebar {
        width: 280px;
      }
    }

    @media only screen and (max-width: 1440px) {
      .row-cols-5 > *{
        flex: 0 0 auto;
        width: 33%;
      }
    }

    @media only screen and (min-width: 1440px) and (max-width: 1900px) {
      .row-cols-5 > *{
        flex: 0 0 auto;
        width: 25%;
      }
    }
  </style>
</head>

<body>
  <main class="col-12 d-flex flex-wrap">
    <x-dashboard.sidebar />
    <div class="col-10 flex-grow-1">
      <x-dashboard.navbar />
      <div class="p-5">
        {{ $slot }}
      </div>
    </div>
  </main>
</body>

@stack('scripts')

</html>

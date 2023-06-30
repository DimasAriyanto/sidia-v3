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
      overflow-y: hidden;
    }
  </style>
</head>

<body>
  <main class="d-flex flex-nowrap overflow-x-hidden">
    <x-dashboard.sidebar />
    <div class="d-flex flex-column flex-grow-1">
      <x-dashboard.navbar />
      <div class="p-5">
        {{ $slot }}
      </div>
    </div>
  </main>
</body>

@stack('scripts')

</html>

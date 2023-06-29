<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }} | {{ @$title }} </title>
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
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

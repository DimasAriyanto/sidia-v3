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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
  <main class="d-flex flex-nowrap">
    <x-dashboard.sidebar />
    <div class="d-flex flex-column flex-grow-1">
      <x-dashboard.navbar />
      <div class="p-5">
        {{ $slot }}
      </div>
    </div>
  </main>
</body>

</html>

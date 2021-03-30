<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>

    <div class="alert alert-success" id="alert" style="visibility: hidden" role="alert">
        Queue was made.
    </div>

    <div class="container col-4 my-4 bg-info py-2 reg-window" align="center">
        @yield('content')
    </div>
</body>
</html>

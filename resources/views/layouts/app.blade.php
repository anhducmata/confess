<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" style="width: 5px; height: 5px;" href="/images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/jquery.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="/js/bootstrap-select.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
    @include('partials.navbar')
    @yield('js')
    @yield('content')
    @include('partials.footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>

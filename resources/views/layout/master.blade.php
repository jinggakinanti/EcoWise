<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <style>
        body {
            background-color: #FDFDFC;
        }
        
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>

    <title>EcoWise</title>
</head>
<body>
    
    <header>
        @include('layout.header')
    </header>

    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')

    <footer>
        @include('layout.footer')
    </footer>
</body>
</html>
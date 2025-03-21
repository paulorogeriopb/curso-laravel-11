<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Celke - Login</title>
</head>

<body class="bg-primary">  
    
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
    
                        @yield('content')

                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>

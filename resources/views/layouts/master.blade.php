<!DOCTYPE html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
    </head>
    <body>
        	@yield('content')
        <script src="{!! asset('js/app.js') !!}"></script>
        <script type="text/javascript">
            @yield ('scripts')
        </script>
    </body>
</html>

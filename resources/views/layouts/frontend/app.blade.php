<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }} | @yield('title') </title>

    <!-- Font --> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"> 
	<!-- Stylesheets --> 
	<link href="{{ asset('asset/frontend/css/bootstrap.css') }}" rel="stylesheet"> 
	<link href="{{ asset('asset/frontend/css/swiper.css') }}" rel="stylesheet"> 
	<link href="{{ asset('asset/frontend/css/ionicons.css') }}" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

	@stack('css')
	
</head>
<body>
    @include('layouts.frontend.partial.header')

	@yield('content')
 @include('layouts.frontend.partial.footer')

    <script src="{{ asset('asset/frontend/js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('asset/frontend/js/tether.min.js') }}"></script>
	<script src="{{ asset('asset/frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/swiper.js') }}"></script>
	<script src="{{ asset('asset/frontend/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
         <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

        <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
    </script>
    <script>
        $(document).on("click", "#guest", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "You Aren't Logged In !!",
                text: "To add Favorite List, You have to LogIn First!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("You Aren't Registered !");
                    }
                });
        });
    </script>
    <script>
        $(document).on("click", "#comment", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "You Aren't Logged In !!",
                text: "To Post a Comment, You have to LogIn First!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("You Aren't LoggedIn !");
                    }
                });
        });
    </script>
    @stack('js')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
 
</body>
</html>

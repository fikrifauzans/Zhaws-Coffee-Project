<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dropify-master/dist/css/dropify.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('dist/css/dropify.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('dis') }}"> --}}

    <!--load all styles -->

</head>

<body class="font-Slab ">
    @include('admin.layouts.sidebar')
    @include('admin.layouts.navbar')


    {{-- Container Content --}}
    <div class="ml-72 static ">
        <div class="w-11/12 mx-auto flex-wrap">
            {{-- Url Lupa namanya --}}
            <p class=" flex justify-end  text-gray-500 my-6"> @yield('url')</p>
            <div class="w-full border-b-2 "></div>

            {{-- Content --}}
            @yield('content')
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('dropify-master/dist/js/dropify.js') }}"></script>

    @stack('js')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Mi Aplicación')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

        <!-- Scripts -->
       {{--  @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body >


        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

            <!-- Page Heading -->

            @include('admin.plantilla.partials.header')  {{-- Incluir el header --}}

            @include('admin.plantilla.partials.sidebar')


            <!-- Page Content -->
            <div class="body-wrapper">
                @yield('content')  {{-- Aquí se insertará el contenido de cada vista --}}
            </div>


            @includeIf('admin.plantilla.partials.footer')  {{-- Incluir el footer --}}



        </div>
        @include('admin.plantilla.partials.script')
        @yield('scripts')
    </body>
</html>

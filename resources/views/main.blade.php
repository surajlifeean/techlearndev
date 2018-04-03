<!DOCTYPE html>
<html lang="en">
@include('partials._header')
@yield('stylesheets')
<body>
@include('partials._navbar')
   
@yield('content')


@include('partials._footer')
@yield('scripts')
</body>

</html>

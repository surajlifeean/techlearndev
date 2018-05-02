<!DOCTYPE html>
<html lang="en">
@include('partials._header')

<body>
@include('partials._navbar')
 
<div>@include('partials._message')</div>
@yield('content')



@include('partials._footer')
@yield('scripts')
</body>

</html>

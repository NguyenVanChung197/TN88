<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    
</head>

<body>

<!-- Header -->
@include('header')

@yield('content')

@yield('scripts')

@include('footer')

</body>
</html>

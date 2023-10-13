<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ setting()->site_description }}">
    <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" />
    <title>{{ setting()->sitename_en }}  @yield('title')</title>
    <title>Document</title>
    @include('frontend.layouts.include.design.style')
</head>
<body>
    @include('frontend.layouts.include.parts.header')
    @yield('content')
    @include('frontend.layouts.include.parts.footer')
    @include('frontend.layouts.include.design.script')
    <script>
        $(document).ready(function(){
            $('.owl-next').empty();
            $('.owl-next').append('<i class="fas fa-arrow-right"></i>');
            $('.owl-prev').empty();
            $('.owl-prev').append('<i class="fas fa-arrow-left"></i>');
        });
    </script>
</body>
</html>
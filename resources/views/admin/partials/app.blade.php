<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" disabled="" href="/css/app-wa-49383fe36a224f045d96e1770a83fee2.css?vsn=d">
    <link rel="canonical" href="https://fontawesome.com/v5.15/icons" id="canonical">
    <title>@yield('title') - Machine Learning Dashboard</title>
    @include('site.partials.styles')
</head>
<body>
@include('site.partials.header')
@yield('content')
@include('site.partials.scripts') 

<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
</body>
</html>

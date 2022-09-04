<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <header>
        @include('includes.header')
    </header>
    <main class="py-5" id="app">
        @yield('content')    
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="openNav">

<head>
    @include('partial.head')
</head>

<body>
    @include('partial.header')

    <div class="new-wrapper">
        <div id="main">
            <div id="main-contents">
                @yield('content')
            </div>
        </div>
    </div>

    @include('partial.footer')
</body>

</html>
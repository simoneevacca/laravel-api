@include('layouts.partials.head')

<body>
    <div id="app">


        @include('layouts.partials.nav-guest')

        <main class="guest">
            @yield('content')
        </main>
    </div>
</body>

</html>

@include('layouts.partials.head')

<body>
    <div id="app">
        

        @include('layouts.partials.nav-admin')

        <main class="admin">
            @yield('content')
        </main>
    </div>
</body>

</html>

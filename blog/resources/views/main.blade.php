<!doctype html>
<html lang="en">

  @include('partials/_head')

  <body>

    @include('partials/_nav')

    @include('partials/_messages')

      @yield('content')

    @include('partials/_footer')

    @include('partials/_javascript')

    @yield('scripts')

  </body>
</html>

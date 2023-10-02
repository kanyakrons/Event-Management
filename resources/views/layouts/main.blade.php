<!doctype html>
<html lang="en">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap');
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dream Event</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.subviews.navbar')
    <main class="bg-gray-100 min-h-screen text-black">
        @yield('content')
    </main>
    @include('layouts.subviews.footer')
</body>

</html>

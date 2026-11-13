<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Trade Journal')</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; }
        nav a { margin-right: 1rem; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
        .profit { color: green; } .loss { color: red; }
    </style>
</head>
<body>
    <nav>
        <a href="/trades">Trades</a>
        <a href="/aboutus">About</a>
    </nav>
    <hr>
    @yield('content')
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'Lead Tracker Demo' }}</title>
  <style>
    body { font-family: system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell; margin: 24px; }
    .card { max-width: 640px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
    .row { margin-bottom: 12px; }
    label { display:block; margin-bottom:6px; font-size:14px; }
    input { width:100%; padding:10px; border:1px solid #ccc; border-radius:8px; }
    button { padding:10px 16px; border:0; border-radius:8px; background:#111827; color:#fff; cursor:pointer; }
    .muted { color:#555; font-size:12px; }
    .hint { background:#f6f6f6; padding:8px; border-radius:6px; font-size:12px; }
    table { border-collapse: collapse; width: 100%; margin-top: 12px; }
    th, td { border: 1px solid #ddd; padding: 8px; font-size: 14px; vertical-align: top; }
    th { background: #f7f7f7; text-align: left; }
    .pill { display:inline-block; padding:2px 8px; border-radius:999px; background:#eef; }
    nav a { margin-right: 12px; }
  </style>
  @stack('head')
</head>
<body>
<nav>
  <a href="{{ route('lander') }}">Lander</a>
  <a href="{{ route('admin') }}">Admin</a>
  <a href="{{ route('tracker.logs') }}">Tracker Logs</a>
</nav>
<div style="margin-top:16px;">
  @yield('content')
</div>
@stack('scripts')
</body>
</html>

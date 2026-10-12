<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'LSP Skema') }}</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #f3f4f6; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        nav { margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; }
        nav a { margin-right: 15px; text-decoration: none; color: #374151; font-weight: 600; }
        nav a:hover { color: #2563eb; }
        .btn { display: inline-block; background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: bold; margin-bottom: 15px; }
        .btn-danger { background-color: #dc2626; border: none; color: white; cursor: pointer; padding: 4px 8px; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #e5e7eb; padding: 10px; text-align: left; }
        th { background-color: #f9fafb; }
        .alert-success { background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <div>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('skema.index') }}">Skema</a>
                <a href="{{ route('peserta.index') }}">Peserta</a>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" style="background:none; border:none; color:#dc2626; cursor:pointer; font-weight:bold;">Logout</button>
            </form>
        </nav>

        @if (isset($header))
            <header style="margin-bottom: 20px;">
                {{ $header }}
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
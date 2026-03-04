<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel H5P') }}</title>

    {{-- Minimal Modern CSS --}}
    <style>
        :root {
            --primary: #2563eb;
            --bg: #f8fafc;
            --card: #ffffff;
            --border: #e5e7eb;
            --text: #1f2937;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: var(--bg);
            color: var(--text);
        }

        .navbar {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0 24px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            margin-left: 20px;
        }

        .navbar a:hover {
            color: var(--primary);
        }

        .brand {
            font-weight: 600;
            font-size: 18px;
            color: var(--primary);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
    </style>
    @stack('h5p-header-script')
</head>

<body>

    <div class="navbar">
        <div class="brand">
            {{ config('app.name', 'Laravel H5P') }}
        </div>

        <div>
            <a href="{{ url('/h5p') }}">H5P</a>
            <a href="{{ url('/h5p/library') }}">Library</a>

            @auth
                <span style="margin-left:20px;">{{ auth()->user()->name }}</span>
            @endauth
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="h5p-wrapper">
                @yield('h5p')
            </div>
        </div>
    </div>

    @stack('h5p-footer-script')
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
</body>

</html>

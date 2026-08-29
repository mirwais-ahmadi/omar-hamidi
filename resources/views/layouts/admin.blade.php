<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title', 'پنل مدیریت') | عمر حمیدی</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
</head>
<body class="min-h-screen bg-mist text-ink antialiased">
    @include('admin.partials.sidebar')

    <div class="flex min-h-screen min-w-0 flex-col lg:ps-72">
        @include('admin.partials.header')

        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
            @hasSection('page_header')
                <div class="mb-6">
                    @yield('page_header')
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <div id="admin-sidebar-backdrop" class="fixed inset-0 z-30 hidden bg-ink/40 lg:hidden"></div>
</body>
</html>

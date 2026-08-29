<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>ورود به پنل مدیریت | عمر حمیدی</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-mist text-ink antialiased">
    <div class="flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-md rounded-3xl border border-line bg-white p-7 shadow-[0_24px_60px_-40px_rgba(18,33,43,0.35)] sm:p-8">
            <div class="mb-8 text-center">
                <span class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-brand text-sm font-bold text-white">OH</span>
                <h1 class="text-xl font-extrabold text-ink">ورود به پنل مدیریت</h1>
                <p class="mt-2 text-sm text-ink-soft">شرکت تجارتی عمر حمیدی لمیتد</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <label class="block">
                    <span class="mb-1.5 block text-sm font-medium text-ink">ایمیل</span>
                    <input type="email" name="email" value="{{ old('email', 'admin@omarhamidi.local') }}" required class="admin-input w-full" dir="ltr">
                </label>
                <label class="block">
                    <span class="mb-1.5 block text-sm font-medium text-ink">رمز عبور</span>
                    <input type="password" name="password" required class="admin-input w-full" dir="ltr" placeholder="رمز عبور">
                </label>
                <label class="flex items-center gap-2 text-sm text-ink-soft">
                    <input type="checkbox" name="remember" value="1" class="rounded border-line">
                    مرا به خاطر بسپار
                </label>
                <button type="submit" class="w-full rounded-xl bg-brand py-3 text-sm font-semibold text-white transition hover:bg-brand-deep">
                    ورود به پنل
                </button>
            </form>
        </div>
    </div>
</body>
</html>

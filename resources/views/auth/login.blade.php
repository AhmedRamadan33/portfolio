<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-zinc-950 px-6 font-sans text-zinc-200 antialiased">
    <div class="w-full max-w-sm">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold text-white">Admin Login</h1>
            <p class="mt-1 text-sm text-zinc-500">Sign in to manage your portfolio</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4 rounded-2xl border border-white/10 bg-white/[0.03] p-6">
            @csrf

            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                @error('email')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Password</label>
                <input type="password" name="password"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>

            <label class="flex items-center gap-2 text-xs text-zinc-500">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5">
                Remember me
            </label>

            <button type="submit" class="w-full rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
                Sign in
            </button>

            <a href="{{ route('home') }}" class="block text-center text-xs text-zinc-500 hover:text-zinc-300">
                &larr; Back to site
            </a>
        </form>
    </div>
</body>
</html>

@props(['title' => 'Dashboard'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} — Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-zinc-950 font-sans text-zinc-200 antialiased">

    @php
        $navItems = [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
            ['route' => 'admin.profile.edit', 'label' => 'Profile'],
            ['route' => 'admin.skills.index', 'label' => 'Skills'],
            ['route' => 'admin.projects.index', 'label' => 'Projects'],
            ['route' => 'admin.experiences.index', 'label' => 'Experience'],
            ['route' => 'admin.educations.index', 'label' => 'Education'],
            ['route' => 'admin.messages.index', 'label' => 'Messages'],
        ];
    @endphp

    <aside class="hidden w-60 shrink-0 border-r border-white/10 bg-white/[0.02] p-6 md:block">
        <a href="{{ route('home') }}" class="mb-8 block text-lg font-semibold text-white">
            Admin<span class="text-indigo-400">.</span>
        </a>

        <nav class="space-y-1 text-sm">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                    class="block rounded-lg px-3 py-2 transition {{ request()->routeIs($item['route'].'*') || request()->routeIs(str($item['route'])->beforeLast('.').'.*') ? 'bg-indigo-500/15 text-indigo-300' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="block w-full rounded-lg px-3 py-2 text-left text-sm text-zinc-500 hover:bg-white/5 hover:text-white">
                Log out
            </button>
        </form>
    </aside>

    <main class="flex-1 p-6 md:p-10">
        <div class="mx-auto max-w-5xl">
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-white">{{ $title }}</h1>
                <a href="{{ route('home') }}" target="_blank" class="text-sm text-zinc-500 hover:text-white">View site &rarr;</a>
            </div>

            @if (session('status'))
                <p class="mb-6 rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('status') }}
                </p>
            @endif

            {{ $slot }}
        </div>
    </main>
</body>
</html>

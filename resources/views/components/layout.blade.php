@props(['profile' => null])
<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile->name ?? config('app.name') }} — {{ $profile->title ?? 'Portfolio' }}</title>
    <meta name="description" content="{{ $profile->tagline ?? '' }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=work-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative bg-white text-gray-900 antialiased">

    @php
        $navItems = [
            ['id' => 1, 'name' => 'Home', 'url' => 'introduction'],
            ['id' => 2, 'name' => 'About', 'url' => 'profile'],
            ['id' => 3, 'name' => 'Skills', 'url' => 'skills'],
            ['id' => 4, 'name' => 'Projects', 'url' => 'portfolio'],
            ['id' => 5, 'name' => 'Experience', 'url' => 'experience'],
            ['id' => 6, 'name' => 'Services', 'url' => 'services'],
        ];
    @endphp

    <div id="navbar" class="sticky top-0 bg-white z-50 transition-all duration-500">
        <div class="navbar flex justify-between mx-auto content gap-2">
            <div class="flex min-w-0 items-center gap-3">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-lg dropdown-content rounded-box z-1 mt-3 w-56 p-2 shadow font-semibold flex-nowrap bg-white text-black">
                        @foreach ($navItems as $item)
                            <li><a data-nav-link data-menu-link href="#{{ $item['url'] }}" class="hover:text-picto-primary px-5 py-3 mx-1">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <a href="#introduction" class="flex items-center border-0 min-w-0 xl:max-xxl:ps-5">
                    <span class="flex h-8 w-8 sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-2xl bg-picto-primary text-lg sm:text-2xl font-bold text-white">
                        {{ mb_substr($profile->name ?? 'P', 0, 1) }}
                    </span>
                    <p class="truncate text-base xs:text-lg sm:text-2xl md:text-[32px] my-auto ms-[12px] font-semibold">{{ $profile->name ?? 'Portfolio' }}</p>
                </a>
            </div>

            <div class="xl:flex items-center shrink-0">
                <ul class="hidden xl:flex menu menu-horizontal text-[15px] font-medium shrink-0">
                    @foreach ($navItems as $item)
                        <li><a data-nav-link href="#{{ $item['url'] }}" class="hover:text-picto-primary px-3 py-3">{{ $item['name'] }}</a></li>
                    @endforeach
                </ul>
                <p class="">
                    <a href="#contact" class="btn btn-sm xs:btn-md sm:btn-lg btn-primary">Contact</a>
                </p>
            </div>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <div class="bg-[#2A374A]">
        @php
            $footerItems = [
                ['id' => 1, 'name' => 'Home', 'url' => 'introduction'],
                ['id' => 2, 'name' => 'About', 'url' => 'profile'],
                ['id' => 3, 'name' => 'Skills', 'url' => 'skills'],
                ['id' => 4, 'name' => 'Projects', 'url' => 'portfolio'],
                ['id' => 5, 'name' => 'Experience', 'url' => 'experience'],
                ['id' => 6, 'name' => 'Services', 'url' => 'services'],
                ['id' => 7, 'name' => 'Contact', 'url' => 'contact'],
            ];
        @endphp
        <div class="pt-25 md:pt-40 content max-2xl:px-3">
            <div class="flex max-md:flex-col justify-between mx-0 items-center h-full w-full text-neutral-200">
                <a href="#introduction" class="flex items-center border-0">
                    <span class="flex h-8 w-8 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-picto-primary text-lg sm:text-2xl font-bold text-white">
                        {{ mb_substr($profile->name ?? 'P', 0, 1) }}
                    </span>
                    <p class="text-3xl sm:text-[32px] my-auto ms-[12px] font-semibold">{{ $profile->name ?? 'Portfolio' }}</p>
                </a>
                <div class="mx-7 max-md:my-7 text-center">
                    @foreach ($footerItems as $item)
                        <a class="mx-2 group inline-block relative w-fit text-[12px] sm:text-[16px]" href="#{{ $item['url'] }}">
                            {{ $item['name'] }}
                            <span class="absolute left-0 bottom-0 h-0.5 w-full bg-white scale-x-0 duration-300 group-hover:scale-x-100"></span>
                        </a>
                    @endforeach
                </div>
                <p class="text-[12px] sm:text-[16px]">Copyright &copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}.</p>
            </div>
            <div class="flex justify-center gap-2 py-6">
                <x-social-media :profile="$profile" class="!text-white hover:!bg-white hover:!text-[#2A374A]" />
            </div>
        </div>
    </div>

    <div class="flex justify-end relative sm:me-10 z-10">
        <a id="scroll-to-top"
            class="fixed bottom-10 me-5 w-10 h-10 sm:w-12.5 sm:h-12.5 lg:w-15 lg:h-15 flex justify-center items-center rounded-full transition delay-150 duration-500 ease-in-out hover:scale-120 hover:cursor-pointer bg-picto-primary hover:bg-picto-primary-dark text-white scale-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6"/>
            </svg>
        </a>
    </div>
</body>
</html>

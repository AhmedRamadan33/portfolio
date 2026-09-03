@props(['profile', 'class' => ''])
@php
    $links = [
        'github' => $profile?->github_url,
        'linkedin' => $profile?->linkedin_url,
        'twitter' => $profile?->twitter_url,
        'whatsapp' => $profile?->whatsapp_url,
    ];
@endphp

@foreach ($links as $key => $url)
    @if ($url)
        <a href="{{ $url }}" target="_blank" rel="noopener" title="{{ ucfirst($key) }}"
            class="inline-flex items-center justify-center text-picto-primary hover:bg-picto-primary hover:text-white rounded-md p-2 pt-3 xs:p-2.5 xs:pt-3.75 sm:p-3 sm:pt-4 md:p-3.75 md:pt-5 {{ $class }}">
            <span class="sr-only">{{ ucfirst($key) }}</span>
            @switch($key)
                @case('github')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4.5 aspect-square" fill="currentColor">
                        <path d="M12 .5C5.73.5.75 5.48.75 11.75c0 5.02 3.26 9.28 7.78 10.78.57.1.78-.25.78-.55 0-.27-.01-1.16-.02-2.11-3.16.69-3.83-1.34-3.83-1.34-.52-1.32-1.26-1.68-1.26-1.68-1.03-.7.08-.69.08-.69 1.14.08 1.74 1.17 1.74 1.17 1.01 1.73 2.65 1.23 3.3.94.1-.73.4-1.23.72-1.51-2.52-.29-5.17-1.26-5.17-5.61 0-1.24.44-2.25 1.17-3.04-.12-.29-.51-1.45.11-3.02 0 0 .96-.31 3.14 1.16a10.9 10.9 0 0 1 5.72 0c2.18-1.47 3.14-1.16 3.14-1.16.62 1.57.23 2.73.11 3.02.73.79 1.17 1.8 1.17 3.04 0 4.36-2.65 5.31-5.18 5.6.41.35.77 1.04.77 2.11 0 1.52-.01 2.75-.01 3.13 0 .3.2.66.79.55 4.51-1.51 7.77-5.76 7.77-10.78C23.25 5.48 18.27.5 12 .5Z"/>
                    </svg>
                    @break
                @case('linkedin')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4.5 aspect-square" fill="currentColor">
                        <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45Z"/>
                    </svg>
                    @break
                @case('twitter')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4.5 aspect-square" fill="currentColor">
                        <path d="M18.9 2H22l-7.2 8.24L23.2 22h-6.6l-5.17-6.77L5.5 22H2.4l7.7-8.8L1 2h6.76l4.68 6.2L18.9 2Zm-1.16 18h1.72L7.36 3.9H5.5L17.74 20Z"/>
                    </svg>
                    @break
                @case('whatsapp')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4.5 aspect-square" fill="currentColor">
                        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.39 1.26 4.81L2 22l5.42-1.36a9.9 9.9 0 0 0 4.62 1.15h.01c5.46 0 9.9-4.45 9.9-9.91C21.95 6.45 17.5 2 12.04 2Zm5.83 14.06c-.25.7-1.24 1.28-2.02 1.44-.53.11-1.23.2-3.58-.77-3.01-1.25-4.95-4.31-5.1-4.51-.15-.2-1.22-1.62-1.22-3.09 0-1.47.75-2.19 1.02-2.49.27-.3.58-.37.78-.37.2 0 .39 0 .56.01.18.01.42-.07.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.53-.1.2-.15.33-.3.5-.15.18-.31.4-.44.53-.15.15-.3.31-.13.61.17.3.76 1.25 1.63 2.03 1.12.99 2.06 1.3 2.36 1.45.3.15.48.13.65-.08.18-.2.75-.87.95-1.17.2-.3.4-.25.68-.15.28.1 1.75.83 2.05.98.3.15.5.23.57.35.08.13.08.75-.17 1.44Z"/>
                    </svg>
            @endswitch
        </a>
    @endif
@endforeach

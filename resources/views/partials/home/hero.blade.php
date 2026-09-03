<div class="flex max-lg:flex-col-reverse sm:justify-between pt-10 lg:mb-27.5 max-xl:gap-2 p-2 max-xxl:px-4 xxl:max-w-[1320px] xxl:mx-auto introduction-profile-background" id="introduction">
    <div class="w-full flex flex-col justify-start max-lg:text-center">
        <div class="pt-12 lg:pt-24 me-31.5 w-full lg:w-auto transition-all duration-500">
            <p class="text-3xl xxs:text-4xl sm:max-xl:text-5xl xl:text-6xl font-semibold w-full">
                Hello, I'm
                <span class="text-nowrap shrink-0 inline-block w-full">{{ $profile->name ?? 'Your Name' }}</span>
            </p>
            <p class="text-xs xxs:text-lg lg:text-[18px] my-6">
                I'm a <span class="bg-highlight">{{ $profile->title ?? 'Backend Developer' }}</span>
                @if ($profile?->location)
                    based in <span class="bg-highlight">{{ $profile->location }}</span>.
                @endif
                {{ $profile->tagline ?? '' }}
            </p>
            <p class="text-center lg:text-start">
                @php
                    $sayHelloUrl = $profile?->whatsapp_url ?: ($profile?->email ? 'mailto:'.$profile->email : '#contact');
                    $sayHelloExternal = (bool) $profile?->whatsapp_url;
                @endphp
                <a class="btn-primary btn btn-xs xxs:btn-lg text-white" href="{{ $sayHelloUrl }}" @if ($sayHelloExternal) target="_blank" rel="noopener" @endif>
                    WhatsApp
                </a>
            </p>
        </div>
        <div class="mx-auto lg:mx-0 relative mt-8">
            <div class="flex max-md:justify-center">
                <a class="btn xxs:btn-lg px-6 max-xs:px-2 xxs:py-3 btn-primary text-xs xxs:text-[14px] sm:text-[16px]" href="#portfolio">
                    My Projects
                </a>
                @if ($profile?->cv_path)
                    <a class="btn xxs:btn-lg px-6 max-xs:px-2 xxs:py-3 hover:border-picto-primary bg-white duration-300 transition-all hover:text-picto-primary ms-4 text-xs xxs:text-[14px] sm:text-[16px]"
                        href="{{ asset('storage/' . $profile->cv_path) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 15V3m0 12-4-4m4 4 4-4M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>
                        </svg>
                        Download CV
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="max-w-134 w-full h-full max-lg:mx-auto aspect-[536/636] relative">
        <div class="shadow-2xl shadow-gray-200 w-full h-full absolute bottom-0 bg-gradient-to-br from-picto-primary/15 to-[#c4f5e9] rounded-3xl center overflow-hidden">
            @if ($profile?->avatar_path)
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $profile->avatar_path) }}" alt="{{ $profile->name }}">
            @else
                <span class="text-8xl font-bold text-picto-primary/30">
                    {{ collect(explode(' ', $profile->name ?? 'Y N'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                </span>
            @endif
        </div>
    </div>
</div>

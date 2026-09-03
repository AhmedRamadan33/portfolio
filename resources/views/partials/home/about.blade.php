<div class="reveal relative mx-4 xxl:mx-auto xxl:max-w-[1320px] -bottom-20 lg:-bottom-28 z-10 rounded-2xl bg-white drop-shadow-2xl max-xl:mb-5 shadow-white xl:p-28 lg:p-20 md:p-16 sm:p-10 p-4" id="profile">
    <div class="flex max-md:flex-col justify-between items-center gap-6">
        <div class="xxl:max-w-106 w-auto h-auto xxl:max-h-126">
            <div class="max-w-106 h-117 w-full overflow-hidden rounded-xl bg-soft-white center">
                @if ($profile?->avatar_path)
                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $profile->avatar_path) }}" alt="{{ $profile->name }}">
                @else
                    <span class="text-6xl font-bold text-picto-primary/20">
                        {{ collect(explode(' ', $profile->name ?? 'Y N'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                    </span>
                @endif
            </div>
            <div class="relative bottom-9">
                <div class="flex justify-center">
                    <div class="px-6 max-w-66 py-3 z-50 text-center bg-white rounded-[4px] center shadow-2xl drop-shadow-2xl shadow-white">
                        <x-social-media :profile="$profile" />
                    </div>
                </div>
            </div>
        </div>

        <div class="max-sm:w-full w-[33rem]">
            <h2 class="text-2xl xxs:text-3xl sm:text-4xl lg:text-[38px] text-[min(24px,38px)] max-md:text-center font-semibold mb-8">
                I am {{ $profile->title ?? 'a Backend Developer' }}
            </h2>
            <div class="text-xs xs:text-[16px] lg:text-lg font-normal text-gray-600">
                @if ($profile?->bio)
                    @foreach (explode("\n", $profile->bio) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p class="mt-3 first:mt-0">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                @else
                    <p>Bio coming soon — edit this from the admin panel.</p>
                @endif
            </div>
        </div>
    </div>
</div>

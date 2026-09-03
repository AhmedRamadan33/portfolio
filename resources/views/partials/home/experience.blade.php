<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="experience">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Experience</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Companies I've worked with and the impact I made along the way.
        </p>
    </div>

    @if ($experiences->isEmpty())
        <p class="text-center text-gray-400">Experience will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto max-w-218 space-y-6">
            @foreach ($experiences as $experience)
                <div class="group relative p-4 xs:p-8 bg-white shadow-gray-300 shadow-lg ease-out duration-500 rounded-lg overflow-hidden">
                    <p class="bg-picto-primary absolute start-0 top-0 w-[5px] h-full"></p>
                    <div class="flex max-sm:flex-col sm:items-start sm:justify-between gap-2">
                        <div>
                            <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $experience->role }}</p>
                            <p class="text-picto-primary font-medium">{{ $experience->company }}</p>
                        </div>
                        <div class="shrink-0 text-[13px] sm:text-[14px] font-medium text-gray-400 sm:text-right">
                            {{ $experience->start_date->format('M Y') }}
                            &mdash;
                            {{ $experience->is_current ? 'Present' : ($experience->end_date?->format('M Y') ?? 'Present') }}
                            @if ($experience->location)
                                <br>{{ $experience->location }}
                            @endif
                        </div>
                    </div>
                    @if ($experience->description)
                        <p class="mt-4 text-[13px] sm:text-[16px] font-normal text-gray-600 leading-relaxed">{{ $experience->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>

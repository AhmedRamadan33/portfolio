<div class="reveal content px-2 pb-10 md:pb-15 lg:pb-25 max-xxl:px-4" id="education">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Education</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            My academic background.
        </p>
    </div>

    @if ($educations->isEmpty())
        <p class="text-center text-gray-400">Education will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto max-w-218 grid gap-6 sm:grid-cols-2">
            @foreach ($educations as $education)
                <div class="p-4 xs:p-8 bg-white shadow-gray-300 shadow-lg rounded-lg">
                    <p class="text-[13px] font-medium text-gray-400">
                        {{ $education->start_date->format('Y') }} &mdash; {{ $education->end_date?->format('Y') ?? 'Present' }}
                    </p>
                    <p class="mt-1 text-lg sm:text-xl font-semibold text-gray-900">{{ $education->degree }}</p>
                    @if ($education->field)
                        <p class="text-gray-600">{{ $education->field }}</p>
                    @endif
                    <p class="mt-2 text-picto-primary font-medium">{{ $education->institution }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>

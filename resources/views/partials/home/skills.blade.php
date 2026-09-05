@php
    $categoryLabels = [
        'backend' => 'Backend',
        'frontend' => 'Frontend',
        'database' => 'Database',
        'tools' => 'Tools & DevOps',
        'other' => 'Other',
    ];
@endphp
<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="skills">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <p class="section-title">Skills</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            The technologies and tools I use to design, build, and ship backend systems.
        </p>
    </div>

    @if ($skills->isEmpty())
        <p class="text-center text-gray-400">Skills will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto max-w-4xl space-y-8">
            @foreach ($skills as $category => $items)
                <div>
                    <p class="mb-4 text-xs font-semibold tracking-widest text-gray-400 uppercase">
                        {{ $categoryLabels[$category] ?? ucfirst($category) }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($items as $skill)
                            <span class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-[#132238] shadow-sm">
                                @if ($skill->icon)<span class="mr-1">{{ $skill->icon }}</span>@endif
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

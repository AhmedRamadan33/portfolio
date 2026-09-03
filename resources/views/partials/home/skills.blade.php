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
        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($skills as $category => $items)
                <div class="rounded-xl bg-white shadow-gray-300 shadow-lg p-6 sm:p-8">
                    <h3 class="mb-5 text-lg font-semibold text-[#132238]">{{ $categoryLabels[$category] ?? ucfirst($category) }}</h3>
                    <div class="space-y-4">
                        @foreach ($items as $skill)
                            <div>
                                <div class="mb-1 flex items-center justify-between text-sm">
                                    <span class="font-medium text-gray-700">
                                        @if ($skill->icon)<span class="mr-1">{{ $skill->icon }}</span>@endif
                                        {{ $skill->name }}
                                    </span>
                                    <span class="text-gray-400">{{ $skill->level }}%</span>
                                </div>
                                <div class="h-2 w-full overflow-hidden rounded-full bg-soft-white">
                                    <div class="h-full rounded-full bg-picto-primary" style="width: {{ $skill->level }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

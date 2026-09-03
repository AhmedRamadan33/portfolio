<div class="reveal content mt-10 md:mt-15 xl:mt-25 mb-10 md:mb-25 max-xxl:p-2" id="portfolio">
    <div class="xl:mb-17.5 mb-5">
        <div class="max-sm:px-2 text-center mx-auto max-w-144.25">
            <p class="section-title">Projects</p>
            <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
                Here's a selection of my recent work, showcasing backend systems, APIs, and full-stack applications I've built.
            </p>
        </div>
    </div>

    @if ($projects->isEmpty())
        <p class="text-center text-gray-400">Projects will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto flex justify-center">
            <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-6">
                @foreach ($projects as $project)
                    <div class="max-w-106 rounded-lg outline-[#FFFFFF] hover:shadow-2xl duration-300 transition-all shadow-gray-300 border border-gray-200 overflow-hidden">
                        <div class="aspect-video w-full overflow-hidden bg-gradient-to-br from-picto-primary/10 to-[#c4f5e9]">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-4xl font-bold text-picto-primary/20">
                                    {{ mb_substr($project->title, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="p-4 xs:p-8">
                            <div class="flex items-start justify-between gap-2">
                                <p class="text-gray-400 text-xs font-medium">{{ !empty($project->tech_stack) ? strtoupper($project->tech_stack[0]) : 'PROJECT' }}</p>
                                @if ($project->featured)
                                    <span class="shrink-0 rounded-full bg-picto-primary/10 px-2.5 py-0.5 text-xs font-medium text-picto-primary">Featured</span>
                                @endif
                            </div>
                            <p class="text-gray-900 text-md xxs:text-lg font-semibold pt-1 mb-3">{{ $project->title }}</p>
                            <p style="line-height:20px" class="text-gray-600 text-xs xxs:text-[14px] text-wrap">{{ $project->description }}</p>

                            @if (!empty($project->tech_stack))
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($project->tech_stack as $tech)
                                        <span class="rounded-full border border-gray-200 px-2.5 py-0.5 text-xs text-gray-500">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-5 flex items-center gap-3">
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" title="View source on GitHub"
                                        class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-picto-primary hover:text-picto-primary">
                                        <span class="sr-only">GitHub</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                                            <path d="M12 .5C5.73.5.75 5.48.75 11.75c0 5.02 3.26 9.28 7.78 10.78.57.1.78-.25.78-.55 0-.27-.01-1.16-.02-2.11-3.16.69-3.83-1.34-3.83-1.34-.52-1.32-1.26-1.68-1.26-1.68-1.03-.7.08-.69.08-.69 1.14.08 1.74 1.17 1.74 1.17 1.01 1.73 2.65 1.23 3.3.94.1-.73.4-1.23.72-1.51-2.52-.29-5.17-1.26-5.17-5.61 0-1.24.44-2.25 1.17-3.04-.12-.29-.51-1.45.11-3.02 0 0 .96-.31 3.14 1.16a10.9 10.9 0 0 1 5.72 0c2.18-1.47 3.14-1.16 3.14-1.16.62 1.57.23 2.73.11 3.02.73.79 1.17 1.8 1.17 3.04 0 4.36-2.65 5.31-5.18 5.6.41.35.77 1.04.77 2.11 0 1.52-.01 2.75-.01 3.13 0 .3.2.66.79.55 4.51-1.51 7.77-5.76 7.77-10.78C23.25 5.48 18.27.5 12 .5Z"/>
                                        </svg>
                                    </a>
                                @endif
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank" rel="noopener"
                                        class="btn hover:border-picto-primary hover:text-picto-primary bg-white text-sm xs:text-[16px] font-semibold hover:gap-3 xs:hover:gap-4 transition-all duration-300 xs:py-5.75 px-6 max-sm:flex-1 max-sm:min-w-0">
                                        Live
                                        <span class="ms-1 xs:ms-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14M13 5l7 7-7 7"/>
                                            </svg>
                                        </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($profile?->github_url)
        <div class="text-center">
            <a href="{{ $profile->github_url }}" target="_blank" rel="noopener" class="btn btn-primary py-3 px-6 mt-12.5 text-center text-[16px] font-semibold">
                More on GitHub
            </a>
        </div>
    @endif
</div>

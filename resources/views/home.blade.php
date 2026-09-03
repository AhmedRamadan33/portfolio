<x-layout :profile="$profile">
    <div class="relative">
        @include('partials.home.hero')
        @include('partials.home.about')
        <div class="bg-soft-white pt-30">
            @include('partials.home.work-process')
        </div>
        @include('partials.home.skills')
        @include('partials.home.projects')
        @include('partials.home.experience')
        @include('partials.home.education')
        @include('partials.home.work-together')
        <div class="bg-soft-white">
            @include('partials.home.services')
        </div>
        @include('partials.home.contact')
    </div>
</x-layout>

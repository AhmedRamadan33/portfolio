<x-admin-layout title="Projects">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.projects.create') }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">
            Add project
        </a>
    </div>

    @if ($projects->isEmpty())
        <p class="text-sm text-zinc-500">No projects yet.</p>
    @else
        <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
            @foreach ($projects as $project)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div class="flex items-center gap-4">
                        <div class="h-12 w-12 shrink-0 overflow-hidden rounded-lg bg-white/5">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">
                                {{ $project->title }}
                                @if ($project->featured)
                                    <span class="ml-2 rounded-full bg-indigo-500/20 px-2 py-0.5 text-xs text-indigo-300">Featured</span>
                                @endif
                            </p>
                            <p class="text-xs text-zinc-500">{{ implode(', ', $project->tech_stack ?? []) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-zinc-400 hover:text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-400 hover:text-rose-300">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin-layout>

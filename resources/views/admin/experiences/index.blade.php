<x-admin-layout title="Experience">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.experiences.create') }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">
            Add experience
        </a>
    </div>

    @if ($experiences->isEmpty())
        <p class="text-sm text-zinc-500">No experience entries yet.</p>
    @else
        <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
            @foreach ($experiences as $experience)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div>
                        <p class="text-sm font-medium text-white">{{ $experience->role }} &middot; {{ $experience->company }}</p>
                        <p class="text-xs text-zinc-500">
                            {{ $experience->start_date->format('M Y') }} &mdash;
                            {{ $experience->is_current ? 'Present' : ($experience->end_date?->format('M Y') ?? 'Present') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-zinc-400 hover:text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.experiences.destroy', $experience) }}" onsubmit="return confirm('Delete this entry?')">
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

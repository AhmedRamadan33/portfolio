<x-admin-layout title="Skills">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.skills.create') }}" class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">
            Add skill
        </a>
    </div>

    @if ($skills->isEmpty())
        <p class="text-sm text-zinc-500">No skills yet.</p>
    @else
        <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
            @foreach ($skills as $skill)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div>
                        <p class="text-sm font-medium text-white">{{ $skill->icon }} {{ $skill->name }}</p>
                        <p class="text-xs text-zinc-500">{{ ucfirst($skill->category) }} &middot; {{ $skill->level }}%</p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-zinc-400 hover:text-white">Edit</a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" onsubmit="return confirm('Delete this skill?')">
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

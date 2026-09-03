@php $skill ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Name</label>
        <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Category</label>
        <select name="category" class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            @foreach (['backend' => 'Backend', 'frontend' => 'Frontend', 'database' => 'Database', 'tools' => 'Tools & DevOps', 'other' => 'Other'] as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $skill->category ?? 'backend') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('category')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Level (0-100)</label>
        <input type="number" name="level" min="0" max="100" value="{{ old('level', $skill->level ?? 80) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('level')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Icon (emoji, optional)</label>
        <input type="text" name="icon" value="{{ old('icon', $skill->icon ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $skill->order ?? 0) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
        Save
    </button>
    <a href="{{ route('admin.skills.index') }}" class="text-sm text-zinc-500 hover:text-white">Cancel</a>
</div>

@php $education ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Institution</label>
        <input type="text" name="institution" value="{{ old('institution', $education->institution ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('institution')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Degree</label>
        <input type="text" name="degree" value="{{ old('degree', $education->degree ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('degree')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-zinc-400">Field of study</label>
    <input type="text" name="field" value="{{ old('field', $education->field ?? '') }}"
        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Start date</label>
        <input type="date" name="start_date" value="{{ old('start_date', isset($education) ? $education->start_date->format('Y-m-d') : '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('start_date')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">End date</label>
        <input type="date" name="end_date" value="{{ old('end_date', $education->end_date?->format('Y-m-d') ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        @error('end_date')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-zinc-400">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $education->order ?? 0) }}"
            class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
        Save
    </button>
    <a href="{{ route('admin.educations.index') }}" class="text-sm text-zinc-500 hover:text-white">Cancel</a>
</div>

<x-admin-layout title="Profile">
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Name</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Title</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                @error('title')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-zinc-400">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}"
                class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-zinc-400">Bio</label>
            <textarea name="bio" rows="5"
                class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Location</label>
                <input type="text" name="location" value="{{ old('location', $profile->location) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Twitter/X URL</label>
                <input type="url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">WhatsApp URL</label>
                <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $profile->whatsapp_url) }}"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">Avatar</label>
                @if ($profile->avatar_path)
                    <img src="{{ asset('storage/' . $profile->avatar_path) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
                @endif
                <input type="file" name="avatar" accept="image/*"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
                @error('avatar')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-zinc-400">CV (PDF)</label>
                @if ($profile->cv_path)
                    <a href="{{ asset('storage/' . $profile->cv_path) }}" target="_blank" class="mb-2 block text-sm text-indigo-400 hover:text-indigo-300">Current CV</a>
                @endif
                <input type="file" name="cv" accept="application/pdf"
                    class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none file:mr-3 file:rounded-md file:border-0 file:bg-indigo-500 file:px-3 file:py-1.5 file:text-white">
                @error('cv')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="border-t border-white/10 pt-6">
            <h2 class="mb-4 text-sm font-semibold text-white">Change password</h2>
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-1 block text-xs font-medium text-zinc-400">New password</label>
                    <input type="password" name="new_password"
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                    @error('new_password')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-xs font-medium text-zinc-400">Confirm new password</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white outline-none focus:border-indigo-400">
                </div>
            </div>
            <p class="mt-2 text-xs text-zinc-500">Leave blank to keep your current password.</p>
        </div>

        <button type="submit" class="rounded-lg bg-indigo-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
            Save changes
        </button>
    </form>
</x-admin-layout>

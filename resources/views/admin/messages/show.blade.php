<x-admin-layout title="Message">
    <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6">
        <div class="mb-6 flex items-start justify-between">
            <div>
                <h2 class="text-lg font-semibold text-white">{{ $message->subject ?: 'No subject' }}</h2>
                <p class="mt-1 text-sm text-zinc-500">
                    From <span class="text-zinc-300">{{ $message->name }}</span>
                    &lt;<a href="mailto:{{ $message->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $message->email }}</a>&gt;
                </p>
                <p class="mt-1 text-xs text-zinc-600">{{ $message->created_at->format('M j, Y \a\t g:i A') }}</p>
            </div>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-rose-400 hover:text-rose-300">Delete</button>
            </form>
        </div>

        <p class="whitespace-pre-line text-sm leading-relaxed text-zinc-300">{{ $message->message }}</p>
    </div>

    <a href="{{ route('admin.messages.index') }}" class="mt-6 inline-block text-sm text-zinc-500 hover:text-white">&larr; Back to messages</a>
</x-admin-layout>

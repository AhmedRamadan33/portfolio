<x-admin-layout title="Messages">
    @if ($messages->isEmpty())
        <p class="text-sm text-zinc-500">No messages yet.</p>
    @else
        <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
            @foreach ($messages as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between gap-4 px-5 py-4 hover:bg-white/[0.03]">
                    <div>
                        <p class="text-sm font-medium text-white">
                            {{ $message->name }}
                            @unless ($message->is_read)
                                <span class="ml-2 rounded-full bg-indigo-500/20 px-2 py-0.5 text-xs text-indigo-300">New</span>
                            @endunless
                        </p>
                        <p class="text-xs text-zinc-500">{{ $message->email }} &middot; {{ $message->subject ?: 'No subject' }}</p>
                    </div>
                    <span class="shrink-0 text-xs text-zinc-500">{{ $message->created_at->diffForHumans() }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $messages->links() }}
        </div>
    @endif
</x-admin-layout>

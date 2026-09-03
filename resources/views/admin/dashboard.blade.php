<x-admin-layout title="Dashboard">
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ([
            ['label' => 'Projects', 'value' => $stats['projects']],
            ['label' => 'Skills', 'value' => $stats['skills']],
            ['label' => 'Experience', 'value' => $stats['experiences']],
            ['label' => 'Education', 'value' => $stats['educations']],
            ['label' => 'Unread messages', 'value' => $stats['unread_messages']],
        ] as $card)
            <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-5">
                <p class="text-2xl font-semibold text-white">{{ $card['value'] }}</p>
                <p class="mt-1 text-sm text-zinc-500">{{ $card['label'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-10">
        <h2 class="mb-4 text-lg font-semibold text-white">Recent messages</h2>

        @if ($recentMessages->isEmpty())
            <p class="text-sm text-zinc-500">No messages yet.</p>
        @else
            <div class="divide-y divide-white/5 rounded-2xl border border-white/10 bg-white/[0.03]">
                @foreach ($recentMessages as $message)
                    <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between gap-4 px-5 py-4 hover:bg-white/[0.03]">
                        <div>
                            <p class="text-sm font-medium text-white">
                                {{ $message->name }}
                                @unless ($message->is_read)
                                    <span class="ml-2 rounded-full bg-indigo-500/20 px-2 py-0.5 text-xs text-indigo-300">New</span>
                                @endunless
                            </p>
                            <p class="text-xs text-zinc-500">{{ $message->subject ?: 'No subject' }}</p>
                        </div>
                        <span class="shrink-0 text-xs text-zinc-500">{{ $message->created_at->diffForHumans() }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-admin-layout>

<x-admin-layout title="Add Skill">
    <form method="POST" action="{{ route('admin.skills.store') }}">
        @csrf
        @include('admin.skills._form')
    </form>
</x-admin-layout>

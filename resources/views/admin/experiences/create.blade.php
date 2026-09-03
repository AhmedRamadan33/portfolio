<x-admin-layout title="Add Experience">
    <form method="POST" action="{{ route('admin.experiences.store') }}">
        @csrf
        @include('admin.experiences._form')
    </form>
</x-admin-layout>

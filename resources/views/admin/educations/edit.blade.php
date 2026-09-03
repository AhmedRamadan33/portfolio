<x-admin-layout title="Edit Education">
    <form method="POST" action="{{ route('admin.educations.update', $education) }}">
        @csrf
        @method('PUT')
        @include('admin.educations._form')
    </form>
</x-admin-layout>

<x-admin-layout title="Add Education">
    <form method="POST" action="{{ route('admin.educations.store') }}">
        @csrf
        @include('admin.educations._form')
    </form>
</x-admin-layout>

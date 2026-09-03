<x-admin-layout title="Add Project">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.projects._form')
    </form>
</x-admin-layout>

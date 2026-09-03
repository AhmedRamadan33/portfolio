<x-admin-layout title="Edit Project">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.projects._form')
    </form>
</x-admin-layout>

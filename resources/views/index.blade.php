@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        @if($tasks->isNotEmpty())
        <div class="w-full grid grid-cols-6 pb-2 border-b border-gray-200">
            <div class="col-span-3 font-semibold">Name</div>
            <div class="col-span-2 font-semibold">Created At</div>
            <div class="col-span-1 font-semibold">Actions</div>
        </div>
        @endif

        @foreach($tasks as $task)
        <x-partials.task-row :task="$task" />
        @endforeach
        <div class="w-full text-center pt-4">
            <x-elements.link-button href="{{ route('tasks.create') }}">
                Add Task
            </x-elements.link-button>
        </div>
    </div>
</div>
@endsection
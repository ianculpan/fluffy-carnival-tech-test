@props([
'task' => null,
])

<div class="w-full flex py-2 border-b border-gray-100">
    <div class="w-5/12">
        <div class="flex flex-row items-center {{ $task?->complete ? 'line-through' : '' }}">{{ $task?->name }}</div>
        <div class="flex flex-row">
            @if($task->tags->isNotEmpty())
            <div class="flex file:flex-row">
                @foreach($task->tags as $tag)
                <x-partials.tag-task-row :tag="$tag" />
                @endforeach
            </div>
            @else
            <div class="text-xs text-gray-500">No tags</div>
            @endif
        </div>
    </div>
    <div class="w-2/12 flex items-center">{{ $task?->created_at->format('jS M Y') }}</div>
    <div class="w-5/12 flex flex-wrap">
        <x-elements.link-button class="mr-2 my-1 w-[110px]" href="{{ route('tasks.complete', ['task' => $task]) }}">
            {{ $task?->complete ? 'Pending' :  'Complete' }}
        </x-elements.link-button>
        <x-elements.link-button class="mr-2 my-1 w-[110px]" href="{{ route('tasks.edit', ['task' => $task]) }}">
            Edit
        </x-elements.link-button>
        <x-elements.link-button-danger class="mr-2 my-1 w-[110px]" href="{{ route('tasks.destroy', ['task' => $task]) }}">
            Delete
        </x-elements.link-button-danger>
    </div>
</div>
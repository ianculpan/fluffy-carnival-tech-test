@props([
'task' => null,
])

<div class="w-full flex py-2 border-b border-gray-100">
    <div class="grid grid-cols-6">
        <div class="col-span-3">
            <div class="flex-row">
                <div class="items-center {{ $task?->complete ? 'line-through' : '' }}">{{ $task?->name }}</div>
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
        <div class="col-span-2">
            <div class="w-5/12 flex items-center">{{ $task?->created_at->format('jS M Y') }}</div>
        </div>
        <div class="col-span-1">
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
    </div>

</div>
@props([
'tags' => null,
'task' => null,
])

<div class="w-full flex py-2 border-b border-gray-100">
    <div class="flex flex-col items-center">
        Select Tags
        <select name="tags[]" multiple>
            <option value="">None</option>
            @foreach($tags as $tag)
            <option @if($task && $task->tags->contains($tag)) selected @endif value="{{ $tag?->id }}">{{ $tag?->name }}</option>
            @endforeach
        </select>
    </div>

</div>
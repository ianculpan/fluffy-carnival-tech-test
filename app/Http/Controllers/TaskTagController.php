<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTaskTagRequest;
use App\Http\Requests\StoreTaskTagRequest;
use App\Models\TaskTags;

class TaskTagController extends Controller
{

    public function store(StoreTaskTagRequest $request)
    {
        $this->authorize('create', $request->taskTag);

        TaskTags::query()->create(
            array_merge(
                $request->validated(),
                ['task_id' => $request->task->id, 'tag_id' => $request->tag->id, 'user_id' => auth()->user()->id]
            )
        );

        return redirect()->to(route('tasks.edit', ['task' => $request->task->id]));
    }

    public function destroy(DestroyTaskTagRequest $request)
    {
        $this->authorize('delete', $request->taskTag);

        $request->taskTag->delete();

        return redirect()->to(route('tasks.edit', ['task' => $request->taskTag->task_id]));
    }
}

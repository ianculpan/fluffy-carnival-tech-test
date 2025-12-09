<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTaskTagRequest;
use App\Http\Requests\CreateTaskTagRequest;

class TaskTagController extends Controller
{

    public function store(CreateTaskTagRequest $request)
    {
        $this->authorize('create', $request->taskTag);

        $request->taskTag->save();

        return redirect()->to(route('tasks.edit', ['task' => $request->taskTag->task_id]));
    }

    public function destroy(DestroyTaskTagRequest $request)
    {
        $this->authorize('delete', $request->taskTag);

        $request->taskTag->delete();

        return redirect()->to(route('tasks.edit', ['task' => $request->taskTag->task_id]));
    }
}

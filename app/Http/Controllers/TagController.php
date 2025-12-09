<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index()
    {
        $tags = auth()->user()?->tags ?? [];

        return view('tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request): RedirectResponse
    {
        Tag::query()->create(
            array_merge(
                $request->validated(),
                ['user_id' => auth()->user()->id]
            )
        );

        return redirect()->to(route('tags.index'))->with('success', 'Tag created successfully');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag): View
    {
        $this->authorize('update', $tag);

        return view('tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag): RedirectResponse
    {
        $this->authorize('update', $tag);

        $tag->update($request->validated());

        return redirect()->to(route('tags.index'))->with('success', 'Tag updated successfully');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $this->authorize('delete', $tag);
        if ($tag->tasks->isNotEmpty()) {
            return redirect()->to(route('tags.index'))->with('error', 'Tag is used in tasks and cannot be deleted');
        }

        $tag->delete();

        return redirect()->to(route('tags.index'))->with('success', 'Tag deleted successfully');
    }
}

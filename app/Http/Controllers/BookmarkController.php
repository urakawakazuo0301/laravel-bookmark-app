<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookmarks = $request->user()->bookmarks()->latest()->get();
        return view('bookmarks.index', ['bookmarks' => $bookmarks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable',
        'tags' => 'nullable|string',
       ]);

       $tagsString = $validated['tags'] ?? '';
       unset($validated['tags']);

       $bookmark = $request->user()->bookmarks()->create($validated);

       $tagNames = collect(explode(',', $tagsString))
        ->map(fn ($name) => trim($name))
        ->filter()
        ->unique();
       
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = $request->user()->tags()->firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

       $bookmark->tags()->sync($tagIds);
       return redirect()->route('bookmarks.index')->with('success', '作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $bookmark = $request->user()->bookmarks()->findOrFail($id);
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $bookmark = $request->user()->bookmarks()->findOrFail($id);
        return view('bookmarks.edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookmark = $request->user()->bookmarks()->findOrFail($id);
        
        $validated = $request -> validate([
            'title' => 'required|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable',
        ]);
        
        $bookmark -> update($validated);
        return redirect()->route('bookmarks.show', $bookmark)->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $bookmark = $request->user()->bookmarks()->findOrFail($id);
        $bookmark -> delete();
        return redirect()->route('bookmarks.index')->with('success', '削除しました');//
    }
}

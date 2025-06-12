<?php

namespace App\Http\Controllers;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
     public function create()
    {
        return view('story.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'content' => 'required',
        ]);

        $story = new Story();
        $story->title = $request->title;
        $story->genre = $request->genre;
        $story->content = $request->content;
        $story->save();

        // For now, just return back with data
        return redirect('/home')->with('success', 'Note submitted successfully!');
    }


        public function index(Request $request)
{
    $query = Story::query();

    if ($request->has('title') && $request->title != '') {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->has('genre') && $request->genre != '') {
        $query->where('genre', 'like', '%' . $request->genre . '%');
    }

    $stories = $query->get();

    return view('story.home', compact('stories'));
}


        public function edit($id)
{
    $story = Story::findOrFail($id);
    return view('story.edit', compact('story'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'content' => 'required',
        ]);

        $story = Story::findOrFail($id);
        $story->title = $request->title;
        $story->genre = $request->genre;
        $story->content = $request->content;
        $story->save();

        return redirect('/home')->with('success', 'Story updated successfully!');
    }

        public function destroy($id)
{
    $story = Story::findOrFail($id);
    $story->delete();

    return redirect('/home')->with('success', 'Story deleted successfully!');
}



}

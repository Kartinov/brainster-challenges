<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion::where('is_approved', 1)->latest()->get();

        return view('dashboard', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('discussions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $formFields = $request->validated();

        $formFields['user_id'] = auth()->user()->id; // add user_id

        // upload an image and save the path
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('images', 'public');
        }

        Discussion::create($formFields);

        return to_route('dashboard')->with(
            'message',
            'Discussion created successfully! It needs to be approved before it can be seen.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        $categories = Category::all();

        return view('discussions.edit', compact('discussion', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDiscussionRequest $request, Discussion $discussion)
    {
        $formFields = $request->validated();

        // upload an image and save the path
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('images', 'public');
        }

        $discussion->update($formFields);

        return redirect()->back()->with(
            'message',
            'Discussion updated successfully!.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return redirect()->back()->with(
            'message',
            'Discussion deleted successfully!.'
        );
    }

    public function manage()
    {
        $discussions = Discussion::where('is_approved', 0)->latest()->get();

        return view('discussions.manage', compact('discussions'));
    }

    public function approve(Discussion $discussion)
    {
        $discussion->update(['is_approved' => 1]);

        return to_route('discussions.manage')
            ->with('message', 'Discussion: ' . $discussion->title . ' approved.');
    }
}

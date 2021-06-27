<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Comment;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoryController extends Controller
{
    /**
     * Chose whether to create or edit a story, if edit, chose a random one
     */

    private $rules;
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'redirect');
        $this->middleware('verified')->except('show', 'redirect');
    }


    public function redirect(Request $request)
    {
        $var = $request->btnradio;
        if ($var == "btnnew") {
            return view('stories.storyForm');
        } else {
            $story = Story::where('isFinished', false)->orderByRaw('RAND()')->take(1)->get();;
            //$story = Story::orderByRaw('RAND()')->take(1)->get();
            if (isset($story) && isset($story[0])) {
                return view('stories.storyForm', compact('story'));
            } else {
                return view('stories.storyForm');
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->isFinished = true;
        $request->score = 0;
        Story::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $comments = Comment::where('parent_post_id', $story->id)->get();
        foreach ($comments as $comment) {
            $comment->author = Account::where('id', $comment->account_id)->get();
        }
        return view('stories.storyShow', compact('story', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('stories.storyForm', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        if (isset($request->change)) {
            $story->score += $request->change == "inc" ? 1 : -1;
            $story->save();
            return $this->show($story);
        }
        $story->isFinished = isset($request->isFinished);
        $story->text = $story->text . $request->text;
        $story->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
    }
}

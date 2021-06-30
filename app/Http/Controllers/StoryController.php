<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $invalidStories = DB::table('story_user')->where('user_id', Auth::id())->get();
            $invalidIDs = array_map(
                function ($n) {
                    return $n->story_id;
                },
                $invalidStories->all()
            );
            $story = Story::where('isFinished', false)->whereNotIn('id', $invalidIDs)->orderByRaw('RAND()')->take(1)->get();;
            if (isset($story) && isset($story[0])) {
                return view('stories.storyForm', compact('story'));
            } else {
                $msg = "There are no incomplete stories (yours don't count, you cant finish your own stories)";
                return view('stories.storyForm', compact('msg'));
            }
        }
    }

    public function postComment(Request $request, Story $story)
    {
        if (!strlen(trim($request->text))) {
            return redirect()->action([StoryController::class, 'show'], ['story' => $story]);
        }
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user_id = Auth::id();
        $comment->commentable_id = $story->id;
        $comment->commentable_type = 'App\Models\Story';
        $comment->save();
        return redirect()->action([StoryController::class, 'show'], ['story' => $story]);
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
        $story = new Story();
        $story->text = $request->text;
        $story->score = 0;
        $story->isFinished = false;
        $story->save();
        $user_id = Auth::id();
        $story->users()->attach($user_id);
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
        $comments = $story->comments;
        foreach ($comments as $comment) {
            $comment->author = $comment->user_id ? User::where('id', $comment->user_id)->get()[0]->name :  "[deleted user]";
        }
        $authors = $story->users;
        return view('stories.storyShow', compact('story', 'comments', 'authors'));
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
        $user_id = Auth::id();
        $story->users()->attach($user_id);
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

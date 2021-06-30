<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DrawingController extends Controller
{

    /**
     * Chose whether to create or edit a drawing, if edit, chose a random one
     */
    private $rules;
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'redirect']);
        $this->middleware('verified')->except(['show', 'redirect']);
    }

    public function redirect(Request $request)
    {
        if ($request->btnradio == "btnnew") {
            return view('drawings.drawingForm');
        } else {
            $invalidDrawings = DB::table('drawing_user')->where('user_id', Auth::id())->get();
            $invalidIDs = array_map(
                function ($n) {
                    return $n->drawing_id;
                },
                $invalidDrawings->all()
            );
            $drawing = Drawing::where('isFinished', false)->whereNotIn('id', $invalidIDs)->orderByRaw('RAND()')->take(1)->get();;
            if (isset($drawing) && isset($drawing[0])) {
                $drawing = $drawing[0];
                return redirect()->action([DrawingController::class, 'edit'], ['drawing' => $drawing]);
            } else {
                $msg = "There are no incomplete drawings (yours don't count, you cant finish your own drawings)";
                return view('drawings.drawingForm', compact('msg'));
            }
        }
    }

    public function postComment(Request $request, Drawing $drawing)
    {
        if (!strlen(trim($request->text))) {
            return redirect()->action([StoryController::class, 'show'], ['story' => $drawing]);
        }
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user_id = Auth::id();
        $comment->commentable_id = $drawing->id;
        $comment->commentable_type = 'App\Models\Drawing';
        $comment->save();
        return redirect()->action([DrawingController::class, 'show'], ['drawing' => $drawing]);
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
    public function create($msg = null)
    {
        return view('drawings.drawingForm', compact('msg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drawing = new Drawing();
        $drawing->image = $request->png;
        $drawing->score = 0;
        $drawing->isFinished = false;
        $drawing->save();
        $user_id = Auth::id();
        $drawing->users()->attach($user_id);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function show(Drawing $drawing)
    {
        $comments = $drawing->comments;
        foreach ($comments as $comment) {
            $comment->author = $comment->user_id ? User::where('id', $comment->user_id)->get()[0]->name :  "[deleted user]";
        }
        $authors = $drawing->users;
        return view('drawings.drawingShow', compact('drawing', 'comments', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function edit(Drawing $drawing)
    {
        return view('drawings.drawingForm', compact('drawing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing)
    {
        if (isset($request->change)) {
            $drawing->score += $request->change == "inc" ? 1 : -1;
            $drawing->save();
            return $this->show($drawing);
        }
        $drawing->image = $request->png;
        $drawing->isFinished = true;
        $drawing->save();
        $user_id = Auth::id();
        $drawing->users()->attach($user_id);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drawing $drawing)
    {
        //
    }
}

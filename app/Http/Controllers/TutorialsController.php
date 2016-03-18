<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Ocademy\Tutorial;
use Ocademy\Category;
use Ocademy\Comment;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;

class TutorialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'store', 'edit','update', 'delete', 'like', 'comment']]);
    }

    /**
     * Landing page
     *
     * @return view
     */
    public function welcome()
    {
        $tutorials = Tutorial::all();
        return view('welcome', compact('tutorials'));
    }

    /**
     * Display all projects.
     *
     * @return view
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.upload', compact('categories'));
    }

    /**
     * Get the page to create a new titorial
     * @return view
     */
    public function create()
    {
        $categories = Category::all();
        return view('tutorials.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'category'    => 'required',
            'url'         => 'required|youtube',
        ]);
        $url = explode('=', $request->input('url'));
        $url = end($url);
        $request['url'] = $url;
        $request['user_id'] = Auth::user()->id;
        $request['category_id'] = $request->category;
        Tutorial::create($request->all());

        return redirect('/')->with('status', 'Tutorial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $likes = $tutorial->likeCount;
        $comments = $tutorial->comments()->latest()->get();

        return view('tutorials.show', compact('tutorial', 'likes', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutorial = Tutorial::find($id);
        $categories = Category::all();

        return view('tutorials.edit', compact('tutorial', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'category'    => 'required',
            'url'         => 'required|youtube',
        ]);

        $url = explode('=', $request->input('url'));
        $url = end($url);
        $request['url'] = $url;

        $tutorial = Tutorial::findOrFail($id);
        $tutorial->update($request->all());

        return redirect()->back()->with('status', 'Tutorial info updated successfully.');
    }

    public function like($id)
    {
        $tutorial = Tutorial::find($id);

        if ($tutorial->liked()) {
            $tutorial->unlike();
            return ['message' => 'unliked'];
        } else {
            $tutorial->like();
            return ['message' => 'liked'];
        }
    }

    /**
     * Comment on a project.
     *
     * @return  user and the comment
     */
    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->tutorial_id = $request->input('video_id');
        $comment->save();
        $comment->time = $comment->created_at->diffForHumans();
        $user = Auth::user();
        return compact('user', 'comment');
    }


    /**
     * [deleteTutorial description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        Tutorial::destroy($id);

        return redirect('/');
    }
}

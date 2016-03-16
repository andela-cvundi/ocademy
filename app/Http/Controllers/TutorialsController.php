<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Ocademy\Tutorial;
use Ocademy\Category;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;

class TutorialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'store', 'edit','update', 'delete']]);
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
        return view('tutorials.show')->with('tutorial', $tutorial);
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

        return view('pages.edittut')->compact('tutorial', 'categories');
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
            'url'         => 'required',
        ]);

        $tutorial = Tutorial::findOrFail($id);
        $tutorial->update($request->all());

        return redirect()->back()->with('status', 'Tutorial info updated successfully.');
    }


    /**
     * [deleteTutorial description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        Tutorial::destroy($id);

        return redirect('/dashboard');
    }
}

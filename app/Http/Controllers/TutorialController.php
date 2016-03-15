<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Ocademy\Tutorial;
use Ocademy\Category;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;

class TutorialController extends Controller
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
        Project::create($request->all());
        \Session::flash('flash_message', 'Tutorial uploaded successfully.');
        return redirect('/dashboard');
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
        \Session::flash('flash_message', 'Tutorial info updated successfully.');

        return redirect()->back();
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

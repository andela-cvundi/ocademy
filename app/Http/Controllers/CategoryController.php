<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;
use Ocademy\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'title'       => 'required'
        ]);

        Category::create($request->all());

        return redirect()->back()->with('status', 'Category created');
    }
}

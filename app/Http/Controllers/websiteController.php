<?php

namespace App\Http\Controllers;

use App\Models\subscribe;
use App\Models\User;
use App\Models\website;
use Illuminate\Http\Request;


class websiteController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth')->except('index');
        // return $this->middleware('websiteMiddleware')->only('edit' , 'update' , 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.createWebsite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataWebsite = request()->validate([
            'title' => 'required',
            'url'   => 'required|url'
        ]);

        $dataWebsite['user_id'] = auth()->user()->id;

        website::create($dataWebsite);

        return redirect('/websites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , subscribe $subscribe)
    {
        $website = website::findOrFail($id);
        $posts = $website->post()->get();
        $subscribe = $website->subscribe()->get();
        return view('project.showWebsite' , compact('website' , 'posts' , 'subscribe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update' , website::findOrFail($id));
        $websites = website::findOrFail($id);
        return view('project.editWebsite' , compact('websites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->authorize('update' , website::findOrFail($id));
        $data = request()->validate([
            'title' => 'sometimes|required',
            'url' => 'sometimes|required',
        ]);

        website::findOrFail($id)->update($data);
        return redirect('/websites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , website::findOrFail($id));
        website::findOrFail($id)->delete();
        return redirect('/websites');
    }
}
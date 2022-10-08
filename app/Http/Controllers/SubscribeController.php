<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use App\Jobs\sendMails;
use App\Mail\postsMail;
use App\Models\post;
use App\Models\subscribe;
use App\Models\User;
use App\Models\website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
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
    public function store(Request $request , user $user , website $website , post $posts)
    {
        subscribe::create([
            'user_id' => auth()->user()->id,
            'website_id' => request('website_id'),
        ]);
        $email = auth()->user()->email;
        $posts = post::where('website_id',request('website_id'))->get();
        PostJob::dispatch($posts , $email);

        return redirect('/websites')->with('success' , "You are now subscribed to this site" );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subscribe::findOrFail($id)->delete();
        return redirect('/websites');
    }
}

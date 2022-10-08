<?php

namespace App\Http\Controllers;

use App\Jobs\NewPostJob;
use App\Jobs\sendMails;
use App\Mail\postsMail;
use App\Models\website;
use App\Models\post;
use App\Models\subscribe;
use App\Models\User;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function store(website $website)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'website_id'  => 'required'
        ]);;

        post::create($data);

        $emailPost = subscribe::with('user')->where('website_id',request('website_id'))->get();
        NewPostJob::dispatch($data , $emailPost);

        return  back();
    }

    public function destroy($id)
    {
        post::findOrFail($id)->delete();
        return back();
    }
}

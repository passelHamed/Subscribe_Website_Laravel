@extends('layouts.app')

@section('title' , 'show')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>websites</title>
    </head>
    <body>

        <div class="dropdown text-end">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Site settings
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/websites">log out to all websites</a></li>
                <li>
                    <form action="/subscribe/@foreach($subscribe as $subscribe) {{ $subscribe->id }}@endforeach" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="dropdown-item" type="submit" value="unSubscribe">
                    </form>
                </li>
                <li><a class="dropdown-item" href="#">view all subscribers</a></li>
            </ul>
        </div>


        <h1 class="text-center pt-4">List Of All Posts For <q class="text-primary">{{ $website->title }}</q></h1>
        <center>
            <div class="mt-5">
                <table class="table table-bordered table-striped table-dark" style="max-width: 60%;">
                    <tr class="w-100 text-center">
                        <th>ID</th>
                        <th>POSTS</th>
                        <th>DESCRIPTION</th>
                        <th>DELETE</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr class="text-center">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                <form action="/post/{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" type="button" class="btn btn-danger" value="Delete Post">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </center>

        <hr class="mt-5 mb-5 pb-3">
        <h3 class="fw-bold">Create New Post</h3>
        <div class="container mt-4">
            <form action="/post" method="post">
                @csrf
                <div class="form-group pb-4">
                    <label class="h4 fw-bold" for="title">Title Post</label>
                    <input type="text" name="title" id="title" class="form-control w-50">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group pb-4">
                    <label class="h4 fw-bold" for="description">Description Post</label>
                    <textarea name="description" id="description" class="form-control w-50"></textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="website_id" value="{{ $website->id }}">
                <button type="submit" class="btn btn-primary btn-lg">submit</button>
            </form>
        </div>
    </body>
    </html>
@endsection
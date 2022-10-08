@extends('layouts.app')

@section('title' , 'create')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center fw-bold">create new website</h1>
    <div class="container mt-5">
        <form action="/website" method="post">
            @csrf
            <div class="form-group pb-4">
                <label class="h2 fw-bold" for="title">title website</label>
                <input type="text" name="title" id="title" class="form-control w-50">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group pb-4">
                <label class="h2 fw-bold" for="url">url website</label>
                <input type="url" name="url" id="url" class="form-control w-50">
            </div>
            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary btn-lg">submit</button>
        </form>
    </div>
</body>
</html>
@endsection
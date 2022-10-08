@extends('layouts.app')

@section('title' , 'index')

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

        
        <div class="container">
            <div class="row">
                @if (Session::has('success'))
                <center><div class="alert alert-success alert-dismissible w-50" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-tiems"></i>
                    </button>
                    <strong>Success !</strong> {{ session('success') }}
                </div></center>
                @endif
                <div class="col-md-12 text-center mt-4">
                    <div>
                        <h2 class="fw-bold mb-4">List Of All Websites</h2>
                        <center><a type="submit" class="btn btn-primary" href="/website/create">create website</a></center>
                    </div>
                </div>
            </div>
        </div>

        <center>
            <div class="mt-5">
                <table class="table table-hover table-bordered table-group-divider table-striped" style="width: 80%;">
                    <tr class="w-100 text-center">
                        <th>ID</th>
                        <th>WEBSITES</th>
                        <th>URL</th>
                        <th>SUBSCRIBE</th>
                        <th>DELETE</th>
                        <th>EDIT</th>
                    </tr>
                    @foreach ($websites as $website)
                        <tr class="text-center">
                            <td>{{ $website->id }}</td>
                            <td><a class="h5 text-decoration-none" href="/website/{{ $website->id }}">{{ $website->title }}</a></td>
                            <td>{{ $website->url }}</td>
                            <td>
                                <form action="/subscribe" method="post">
                                    @csrf
                                    <input type="submit" value="subscribe" class="btn btn-success">
                                    <input type="hidden" name="website_id" value="{{ $website->id }}">
                                </form>
                            </td>
                            <td>
                                <form action="/website/{{ $website->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="delete website">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-warning" type="submit" href="/website/{{ $website->id }}/edit">edit website</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </center>
    </body>
    </html>
@endsection
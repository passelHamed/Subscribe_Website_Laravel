<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">All Posts In Website</h1>
        <hr>
        @foreach ($posts as $post)
            <h1>Post number {{ $post->id }}</h1>
            <h1>Post title : {{ $post->title }}</h1>
            <h1>Post description : {{ $post->description }}</h1>
            <hr>
        @endforeach
    </div>
</body>
</html>
@extends('main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>
        <hr>
    </div> <!-- end of row -->

<div class="container">
    @foreach($posts as $post)

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=".../100px180/" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more.</a>
        </div>
      </div>

    @endforeach

    <div class="text-center">
        {{ $posts->render() }}
    </div>
</div>

@endsection

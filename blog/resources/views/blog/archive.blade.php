@extends('main')

@section('title', '| Archive')

@section('content')

<div class="container">
    @foreach($post as $post)

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=".../100px180/" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $post->id }}</h5>
          <p class="card-text">{{ $post->title }}</p>
          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more.</a>
        </div>
      </div>
    @endforeach
</div>

@endsection

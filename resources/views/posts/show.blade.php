@extends('layout') 
@section('content')
<div class="col-sm-8 blog-main">
  <h1>{{ $post->title }}</h1>
  {{ $post->body }}
  <hr>
  <div class="comment">
    <ul class="list-group">
      @foreach ($post->comments as $comment)
      <li class="list-group-item">
        <strong>{{ $comment->created_at->diffForHumans() }}</strong> {{ $comment->body }}
      </li>
      @endforeach
    </ul>
    <hr> 
    {{-- Add a comment --}}
    <div class="card">
      <div class="card-block container-fluid">
        <form action="/posts/{{ $post->id }}/comments" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea name="body" id="body" class="form-control" placeholder="Your comment here..."></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Add comment</button>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
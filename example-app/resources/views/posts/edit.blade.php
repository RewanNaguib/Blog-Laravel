@extends('layouts.app')

@section('title')edit Page @endsection

@section('content')

<div class="container">
<form method="POST" action="{{route('posts.update', ['post' => $post['id']]) }}">

@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

@method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="text"  name="title" value="{{ $post->title }}"  >
  </div>

   <div class="form-group">
    <label for="title">Description</label>
    <textarea class="form-control" id="desc" rows="3" name="description" > {{ $post->description }}</textarea>
  </div>

 
<div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{ $user->name}}</option>
      @endforeach

      </select>
    </div>
  
  <button type="submit" class="btn btn-primary" >Update</button>

</form> 
</div>
@endsection

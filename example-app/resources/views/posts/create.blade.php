@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">

@csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title"  class="form-control" id="text" >
  </div>

  <div class="form-group">
    <label for="title" >Description</label>
    <textarea class="form-control" name="description"  id="desc" rows="3" > </textarea>
  </div>

  <div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
         @endforeach

      </select>
    </div>
  <button type="submit" class="btn btn-success">create</button>

</form> 
</div>
@endsection

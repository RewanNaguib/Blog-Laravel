@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title:-</h5>
    <p class="card-text">{{ $post->title }}</p>
    <h5 class="card-title">Description:-</h5>
    <p class="card-text">{{ $post->description }}</p>
   
  </div>
</div>




<div class="card" style="margin-top:30px;">
  <div class="card-header">
    Post Creator info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name:-</h5>
    <p class="card-text">{{  $post->user ? $post->user->name : 'user not found' }}</p>
    <h5 class="card-title">Email:-</h5>
    <p class="card-text">{{ $post->user ? $post->user->email : 'email not found'}}</p>
    <h5 class="card-title">Created at:-</h5>
    <p class="card-text">{{$post->user ? $post->created_at->format('l jS \of F Y h:i:s A') : 'created_at not found' }}</p>
    
  </div>
</div>
</div>
@endsection
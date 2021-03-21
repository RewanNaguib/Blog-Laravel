@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')




<div class="row justify-content-center"style="margin-top:30px;" >
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
</div>

<div class="container" style="margin-top : 30px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created By </th>
      <th scope="col">Actions </th>
    </tr>
  </thead>
  <tbody>
  @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if(session()->get('danger'))
      <div class="alert alert-danger">
          {{ session()->get('danger') }}
      </div>
      @endif


  @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
   

      <div>
      <td>
          
          <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">  
          <div> 
          <a class="btn btn-info" style="margin-bottom: 20px;" href="{{ route('posts.show',['post' => $post['id']]) }}" >View</a>
           <a class="btn btn-primary" style="margin-bottom: 20px;" a href="{{ route('posts.edit',['post' => $post['id']]) }}" >Edit </a>
           
          @csrf
          @method('DELETE') 
         <button type="submit" class="btn btn-danger" style="margin-bottom: 20px;" onclick="return confirm('Are you sure you want to delete this post ?')">Delete</button>
         </div>
          </form>
          </td>
          </div>
    </tr>
    @endforeach
  </tbody>
</table>
{{$posts->links("pagination::bootstrap-4")}}
</div>
@endsection

        @extends('layouts.app')

        @section('content')
        <div class="clearfix">
        <a href="{{route('posts.create')}}" class="btn btn-info mb-2  float-right">Add Post</a>
        </div>
        <div class="card card-default">
        <div class="card-header">All Posts</div>
        @if ($posts->count()>0)
        <div class="card-body">
      
          <table class="table text-center">
            <thead>
            <tr>
            <th>image</th>
            <th>title</th>
            <th>action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
            <tr>
            <td>
            <img width="100px" height="50px" src="{{asset('storage/'.$post->image)}}" alt="">
            </td>
            <td>
            {{$post->title}}
            </td>
            <td>
            <form action="{{route('posts.destroy' ,$post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="float-right btn btn-danger ">{{$post->trashed()? 'Delete' : 'trashed'}}</button>
            </form>
            @if (!$post->trashed())
            <a href="{{route('posts.edit',$post->id)}}" class="mr-2 btn btn-primary float-right">Edit</a>
        @else 
        <a href="{{route('trashed.restore',$post->id)}}" class="mr-2 btn btn-primary float-right">restore</a>
            @endif
            </td>
            </tr>
        
            @endforeach
        
        
            </tbody>
            </table>
        
    
</div>
@else 
<div class="card-body text-center">
<h1>no posts yet</h1>
</div>
        @endif
      </div>
        @endsection



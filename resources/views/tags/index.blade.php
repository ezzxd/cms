@extends('layouts.app')

@section('content')
@if (session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
@endif
<div class="clearfix">
    <a href="{{route('tags.create')}}" class="btn btn-info mb-2  float-right">Add categories</a>
</div>
<div class="card card-default">
    <div class="card-header">All Tags</div>
    <div class="card-body">
        
  <table class="table table-dark">
       <tbody>
       @foreach ($tags as $tag) 
      <tr>
                  <td>
                  {{$tag->name}}<span class="ml-2 badge  badge-warning ">{{$tag->posts->count()}}</span>
                
                </td>
                <td>
                  <form action="{{route('tags.destroy' ,$tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="float-right btn btn-danger ">Delete</button>
                    </form>
                  <a href="{{route('tags.edit',$tag->id)}}" class="mr-2 btn btn-primary float-right">Edit</a>

                </td>
              </tr>
             
              @endforeach
       
           
          </tbody>
</table>
   
         

    </div>

</div>
@endsection


 
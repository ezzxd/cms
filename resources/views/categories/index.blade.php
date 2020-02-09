@extends('layouts.app')

@section('content')
@if (session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
@endif
<div class="clearfix">
    <a href="{{route('categories.create')}}" class="btn btn-info mb-2  float-right">Add categories</a>
</div>
<div class="card card-default">
    <div class="card-header">All categories</div>
    <div class="card-body">
        
  <table class="table table-dark">
       <tbody>
            @foreach ($categories as $category)
  <tr scope="row">
                  <td>
                  {{$category->name}}
                </td>
                <td>
                  <form action="{{route('categories.destroy' ,$category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="float-right btn btn-danger ">Delete</button>
                    </form>
                  <a href="{{route('categories.edit',$category->id)}}" class="mr-2 btn btn-primary float-right">Edit</a>

                </td>
              </tr>
             
              @endforeach
       
           
          </tbody>
</table>
   
         

    </div>

</div>
@endsection


 
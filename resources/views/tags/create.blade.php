@extends('layouts.app')

@section('content')
<h1>create Cat</h1>
<div class="card card-default">
    <div class="card-header">{{isset($tag)?'Update tag':'Add new tag'}}</div>
    <div class="card-body">
        <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">
            @csrf
            @if (isset($tag))
            @method('PUT')

            @endif


            <div class="form-group">
        <label for="tag"> tag name :</label>
        <input value="{{isset($tag)?$tag->name:''}}" class="@error('name') is-invalid @enderror form-control" type="text" name="name" id="" placeholder="{{isset($tag)?'Update tag name':'Add  tag name'}} "
         >
         @error('name')
         <div class="alert alert-danger">{{ $message }}</div>
     @enderror
         </div>
     
         <div class="form-group">
            <button  class="btn btn-success" >{{isset($tag)?'Edit name':'Add '}}</button>
             </div>
        </form>
    </div>
</div>
@endsection

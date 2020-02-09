@extends('layouts.app')

@section('content')
<h1>create Cat</h1>
<div class="card card-default">
    <div class="card-header">{{isset($category)?'Update name Category':'Add new Category'}}</div>
    <div class="card-body">
        <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')

            @endif


            <div class="form-group">
        <label for="category"> category name :</label>
        <input value="{{isset($category)?$category->name:''}}" class="@error('name') is-invalid @enderror form-control" type="text" name="name" id="" placeholder="{{isset($category)?'Update Category name':'Add  Category name'}} "
         >
         @error('name')
         <div class="alert alert-danger">{{ $message }}</div>
     @enderror
         </div>
     
         <div class="form-group">
            <button  class="btn btn-success" >{{isset($category)?'Edit name':'Add '}}</button>
             </div>
        </form>
    </div>
</div>
@endsection

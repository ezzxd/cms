@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">All users</div>
@if ($users->count()>0)
<div class="card-body">

  <table class="table text-center">
    <thead>
    <tr>
    <th>image</th>
    <th>username</th>
    <th>permissions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
    <td>

        <img src="{{$user->getGrav()}}" alt="" style="border-radius:50%;width:60px" height="60px">
{{--     <img width="100px" height="50px" src="{{asset('storage/'.$user->image)}}" alt="">
 --}}   
 </td>
    <td>
    {{$user->name}}
    </td>
    <td>
        @if (!$user->isAdmin())
<form action="{{route('users.make-admin' ,$user->id)}}" method="POST">
@csrf
<button class="btn btn-info" type="submit"> make admin</button>
</form>
            @else
            {{$user->role}}

        @endif
        </td>
 
    </tr>

    @endforeach


    </tbody>
    </table>


</div>
@else 
<div class="card-body text-center">
<h1>no users yet</h1>
</div>
@endif
</div>
@endsection



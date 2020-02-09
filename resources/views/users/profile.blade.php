@extends('layouts.app')

@section('content')
<h1>create Cat</h1>
<div class="card card-default">
    <div class="card-header">Profile</div>
    <div class="card-body">
        <form action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
           
            <div class="form-group">
                <label for="name">name :</label>
                <input value="{{$user->name}}" class=" form-control" type="text" name="name" >
                
                 </div>

            <div class="form-group">
        <label for="email">Email :</label>
        <input value="{{$user->email}}" class=" form-control" type="text" name="email" >
        
         </div>
         <div class="form-group">
            <label for="about">about :</label>
            <textarea   class=" form-control" name="about" placeholder="tell us about you" id=""  rows="2"></textarea>           
            
             </div>
             <div class="form-group">
                <label for="facebook">facebook :</label>
                <input value="{{$user->facebook}}" class=" form-control" type="text" name="facebook" >
                
                 </div>
                 <div class="form-group">
                    <label for="twitter">twitter :</label>
                    <input value="{{$user->twitter}}" class=" form-control" type="text" name="twitter" >
                    
                     </div>

                  
                         <div class="form-group">

                            <label for="picture">picture :</label><br>
                            <img src="{{$user->getGrav()}}" alt="">
                            <br>
                            <br>
                            <input value="" class=" form-control" type="file" name="twitter" >
                            
                             </div>


         <div class="form-group">
            <button  class="btn btn-success" >Update Profile</button>
             </div>
        </form>
    </div>
</div>
@endsection

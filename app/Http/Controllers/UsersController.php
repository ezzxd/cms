<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function index()
    {
       return view('users.index')->with('users',User::all());
    }
    public function makeAdmin(user $user)
    {
       $user->role='admin';
       $user->save();      
        return redirect(route('users.index'));
       
    }
    public function edit(User $user)
    {
        return view('users.profile',['user'=> $user]);
    }
}

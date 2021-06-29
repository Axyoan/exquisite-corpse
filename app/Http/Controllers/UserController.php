<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login()
    {
        return view('users.userLogin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        return view('users.userIndex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($error = null)
    {
        return view('users.userForm', compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $name = $request->name ? $request->name : null;
        $email = $request->email ? $request->email : null;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $confirmPassword = $request->password_confirmation;
        if ($user->name == null or $user->email == null or $user->password == null) {
            $error = "You must fill all fields";
            return view('users.userForm', compact('error', 'name', 'email'));
        }
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $error = "Incorrect email";
            $email = null;
            return view('users.userForm', compact('error', 'name', 'email'));
        }
        if ($user->password != $confirmPassword) {
            $error = "Passwords dont match";
            return view('users.userForm', compact('error', 'name', 'email'));
            //return redirect()->route('user.create')->compact($error);
        }
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Auth::logout();
        if ($user->delete()) {
            dd("worked :o");
        }
        return view('users.userShow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();
        return redirect('/');
    }
}

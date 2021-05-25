<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::get();
        return view('accounts.accountIndex', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($error = null)
    {
        return view('accounts.accountForm', compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account();
        $account->username = $request->username;
        $account->email = $request->email;
        $account->password = $request->password;
        $confirmPassword = $request->password_confirmation;
        if ($account->username == null or $account->email == null or $account->password == null) {
            $error = "You must fill all fields";
            return view('accounts.accountForm', compact('error'));
        }
        if (!filter_var($account->email, FILTER_VALIDATE_EMAIL)) {
            $error = "Incorrect email";
            return view('accounts.accountForm', compact('error'));
        }
        if ($account->password != $confirmPassword) {
            $error = "Passwords dont match";
            return view('accounts.accountForm', compact('error'));
            //return redirect()->route('account.create')->compact($error);
        }
        $account->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('accounts.accountShow', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}

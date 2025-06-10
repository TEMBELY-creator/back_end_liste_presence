<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validated([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return User::create($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return User::find($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = $request->validated([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return User::update($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return User::delete($user);
    }
}

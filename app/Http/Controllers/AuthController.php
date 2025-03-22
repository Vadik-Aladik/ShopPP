<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AuthRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Users/Login');
    }

    public function registration()
    {
        return Inertia::render('Users/Registration');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        auth()->login($user, true);
        return response()->json([
            'auth' => true,
        ]);
    }

    public function authentify(AuthRequest $request)
    {
        $data = $request->validated();
        if(auth()->attempt($data, true)){
            return response()->json([ 'login' => true]);
        }
        else{
            return response()->json([ 'login' => false]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'logout' => true
        ]);
    }
}

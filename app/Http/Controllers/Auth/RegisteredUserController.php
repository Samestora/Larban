<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController
{
    public function store(Request $request, CreateNewUser $creator)
    {
        $user = $creator->create($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}

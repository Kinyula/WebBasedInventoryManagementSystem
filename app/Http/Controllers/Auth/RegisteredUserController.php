<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
            // 'profile_image' => ['required', 'image']

        ]);

        $users = new User();
        $users->username = $request->input('username');
        $users->password = Hash::make($request->input('password'));
        $users->email = $request->input('email');

        if ($request->hasFile('profile_image')) {
            $profile_image =  $users->profile_image = $request->file('profile_image')->store('public/profile_images') ?? NULL;

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];
            $users->profile_image = $profile_image;
        } else {
            $users->profile_image = 'user3.png';
        }




        $users->save();

        return redirect(RouteServiceProvider::LOGIN);
    }
}

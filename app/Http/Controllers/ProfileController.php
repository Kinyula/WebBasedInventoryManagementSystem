<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),

        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'profile_image' => ['required']
        ]);

        $users = User::findOrFail($id);

        $users->username = $request->input('username');

        $users->email = $request->input('email');

        $profile_image = auth()->user()->profile_image;


        if (File::exists(public_path('storage/profile_images/' . $profile_image))) {

            File::delete(public_path('storage/profile_images/' . $profile_image));
        }



        $new_profile_image  = $request->file('profile_image')->store('public/profile_images');
        $profile_image = explode('/', $new_profile_image);
        $profile_image = $profile_image[2];

        $users->profile_image = $profile_image;

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $users->update();


        return Redirect::route('profile.edit', ['id' => $users->id])->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

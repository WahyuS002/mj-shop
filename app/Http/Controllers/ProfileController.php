<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('public.user.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('public.user.profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->validated();

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ( ! empty($request->password) || $request->password != null) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            if (isset(($user->media[0]))) {
                $user->media[0]->delete();
            }

            $user->addMediaFromRequest('picture')
                ->toMediaCollection('profile_pictures');
        }

        return redirect()
            ->to(route('profile.index'))
            ->withSuccess('Berhasil memperbarui profil');
    }
}

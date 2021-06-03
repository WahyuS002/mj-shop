<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:128',
            'email' => 'required|email|min:12|max:128',
            'password' => 'nullable|min:8|max:128',
            'picture' => 'nullable|max:2048|mimes:jpg,jpeg,png'
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password !== '')
            $user->password = bcrypt($request->password);

        $user->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            if (isset($user->media[0])) {
                $user->media[0]->delete();
            }

            $user->addMediaFromRequest('picture')
                ->toMediaCollection('user_profile');
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui profil');
    }
}

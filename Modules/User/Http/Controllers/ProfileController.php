<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Modules\User\Rules\MatchCurrentPassword;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('user::profile');
    }


    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'delivered_by' => 'nullable|string|max:255',
            'associate' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
        ]);

        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
            'area' => $request->area,
            'associate' => $request->associate,
            'delivered_by' => $request->delivered_by,
        ]);

        if ($request->has('image')) {
            if ($request->has('image')) {
                $tempFile = Upload::where('folder', $request->image)->first();

                if (auth()->user()->getFirstMedia('avatars')) {
                    auth()->user()->getFirstMedia('avatars')->delete();
                }

                if ($tempFile) {
                    auth()->user()->addMedia(Storage::path('temp/' . $request->image . '/' . $tempFile->filename))->toMediaCollection('avatars');

                    Storage::deleteDirectory('temp/' . $request->image);
                    $tempFile->delete();
                }
            }
        }

        toast('Profile Updated!', 'success');

        return back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'  => ['required', 'max:255', new MatchCurrentPassword()],
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);

        toast('Password Updated!', 'success');

        return back();
    }
}

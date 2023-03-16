<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.profile.update');
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.profile.update');
        }
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            // Remove the old photo if it exists
            Storage::disk('public')->delete('profilePhoto/' . $user->photo);

            $file = $request['photo'];

            // Generate a unique, hashed filename for the image
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Store the file in the "PhotoProfile" folder
            $path = Storage::disk('public')->putFileAs('profilePhoto', $file, $filename);
            $user->photo = $filename;
        }

        $user->save();

        if (auth()->user()->role == 'receptionist') {
            return redirect('/hotel/receptionist/profile')->with('success', 'User updated successfully!');;
        } elseif (auth()->user()->role == 'admin') {
            return redirect('/hotel/admin/profile')->with('success', 'User updated successfully!');;
        }
    }
}

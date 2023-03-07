<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $receptionists = User::where('role', 'receptionist')->get();

        return view('pages.admin.admin.receptionist.index', compact('receptionists'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // Get the uploaded file
        $file = $request['photo'];

        // Generate a unique, hashed filename for the image
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // Store the file in the "PhotoProfile" folder
        $path = Storage::disk('public')->putFileAs('profilePhoto', $file, $filename);


        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'receptionist';
        $user->photo = $filename;

        $user->save();

        return back();
    }

    public function edit(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => '',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = ($request->password) ? bcrypt($request->password) : $user->password;

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

        return back();
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::delete('profilePhoto/' . $user->photo);
        }
        $user->delete();

        return back();
    }
}

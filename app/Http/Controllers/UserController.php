<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $receptionists = User::where('role', 'receptionist')->get();

        return view('pages.admin.admin.receptionist.index', compact('receptionists'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $request->photo->store('profilePhoto', 'public');

        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'receptionist';
        $user->photo = $request->photo->hashName();

        $user->save();

        return back();
    }
}

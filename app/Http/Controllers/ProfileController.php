<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.receptionist.profile.update', []);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,

        ]);

        return redirect('/hotel/receptionist/profile')->with('success', 'User updated successfully!');
    }
}

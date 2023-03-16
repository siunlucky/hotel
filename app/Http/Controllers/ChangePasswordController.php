<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'receptionist') {
            return view('pages.admin.receptionist.password.update');
        } elseif (auth()->user()->role == 'admin') {
            return view('pages.admin.admin.password.update');
        }
    }

    public function update(Request $request, User $user)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Check if the current password is correct
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password with the new password
        $user->update(['password' => Hash::make($validatedData['new_password'])]);

        return back()->with('success', 'Password updated successfully.');
    }
}

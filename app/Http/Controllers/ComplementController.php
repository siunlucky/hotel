<?php

namespace App\Http\Controllers;


use App\Models\Complement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplementController extends Controller
{
    public function index()
    {
        $complements = Complement::All();

        return view('pages.admin.admin.manage-hotel.complements.index', compact('complements'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $complement = new Complement();

        $complement->name = $request->name;

        $complement->save();

        return back();
    }

    public function edit(Request $request, Complement $complement)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $complement->name = $request->name;

        $complement->save();

        return back();
    }

    public function destroy(Complement $complement)
    {
        $complement->delete();

        return back();
    }
}

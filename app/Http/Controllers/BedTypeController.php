<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BedTypeController extends Controller
{
    public function index()
    {
        $beds = Bed::All();

        return view('pages.admin.admin.manage-hotel.beds-types.index', compact('beds'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $bed = new bed();

        $bed->name = $request->name;

        $bed->save();

        return back();
    }

    public function edit(Request $request, Bed $bed)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $bed->name = $request->name;

        $bed->save();

        return back();
    }

    public function destroy(Bed $bed)
    {
        $bed->delete();

        return back();
    }
}

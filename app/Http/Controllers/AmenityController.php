<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::All();

        return view('pages.admin.admin.manage-hotel.amenities.index', compact('amenities'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $amenity = new Amenity();

        $amenity->name = $request->name;

        $amenity->save();

        return back();
    }

    public function edit(Request $request, Amenity $amenity)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $amenity->name = $request->name;

        $amenity->save();

        return back();
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return back();
    }
}

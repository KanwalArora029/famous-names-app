<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


use App\FamousNames;

class FamousNamesController extends Controller
{
    public function index()
    {
        // $famousNames = json_decode(File::get(public_path('famous-names.json')))->famousNames;

        // // save the famous names to the database
        // foreach ($famousNames as $name) {
        //     $famousName = new FamousNames();
        //     $famousName->name = $name->name;
        //     $famousName->lat = $name->location->lat;
        //     $famousName->lng = $name->location->lng;

        //     // check if the name and location already exists in the database then don't save
        //     $nameExists = FamousNames::where('name', $name->name)->where('lat', $name->location->lat)->where('lng', $name->location->lng)->first();
        //     if ($nameExists) {
        //         continue;
        //     }
        //     $famousName->save();
        // }

        $names = FamousNames::all();


        return view('famous-names.index', compact('names'));
    }

    public function store()
    {
        $famousNames = json_decode(File::get(public_path('famous-names.json')))->famousNames;

        // save the famous names to the database
        foreach ($famousNames as $name) {
            $famousName = new FamousNames();
            $famousName->name = $name->name;
            $famousName->lat = $name->location->lat;
            $famousName->lng = $name->location->lng;

            // check if the name and location already exists in the database then don't save
            $nameExists = FamousNames::where('name', $name->name)->where('lat', $name->location->lat)->where('lng', $name->location->lng)->first();
            if ($nameExists) {
                continue;
            }
            $famousName->save();
        }

        return redirect()->back()->with('status', 'Famous Names Added Successfully');
    }

    public function edit($id)
    {
        $famousName = FamousNames::find($id);
        //return view('famous-names.edit', compact('famousName'));
        return response()->json([
            'status' => '200',
            'famousName' => $famousName,
        ]);
    }

    public function update(Request $request)
    {
        $name_id = $request->input('name_id');
        $famousName = FamousNames::find($name_id);
        $famousName->name = $request->input('name');
        $famousName->lat = $request->input('latitude');
        $famousName->lng = $request->input('longitude');
        $famousName->update();

        return redirect()->back()->with('status', 'Famous Name Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $name_id = $request->input('del_name_id');
        $famousName = FamousNames::find($name_id);
        $famousName->delete();

        return redirect()->back()->with('status', 'Famous Name Deleted Successfully');
    }
}

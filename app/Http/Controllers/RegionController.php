<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('autorized.super_admin.create_region', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'countries_id' => 'required|integer|exists:countries,id',
        ]);

        Region::create([
            'name' => $request->input('name'),
            'countries_id' => $request->input('countries_id'),
        ]);

        return redirect()->route('create_region')->with('success', 'Region created successfully!');
    }

    public function createAdmin()
    {
        $countries = Country::all();
        return view('autorized.admin.create_region', compact('countries'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'countries_id' => 'required|integer|exists:countries,id',
        ]);

        Region::create([
            'name' => $request->input('name'),
            'countries_id' => $request->input('countries_id'),
        ]);

        return redirect()->route('create_region')->with('success', 'Region created successfully!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

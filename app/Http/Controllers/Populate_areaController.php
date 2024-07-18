<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Populate_area;
class Populate_areaController extends Controller
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
    $regions = Region::all(); // Получаем все регионы
    return view('autorized.super_admin.create_populated_area', compact('regions'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|integer|exists:regions,id',
        ]);

        Populate_area::create([
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
        ]);

        return redirect()->route('create_populated_area')->with('success', 'Populated area created successfully!');
    }


    public function createAdmin()
    {
        $regions = Region::all(); // Получаем все регионы
        return view('autorized.admin.create_populated_area', compact('regions'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|integer|exists:regions,id',
        ]);

        Populate_area::create([
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
        ]);

        return redirect()->route('create_populated_area')->with('success', 'Populated area created successfully!');
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

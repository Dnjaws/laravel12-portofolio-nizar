<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Location::all();
        return view('Location.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Location;
        $data->province=$request->province;
        $data->city=$request->city;
        $data->address_detail=$request->address_detail;
        $data->save();

        return redirect('admin/location/create')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Location::find($id);
        return view('Location.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Location::find($id);
        return view('Location.edit', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Location::find($id);
        $data->province=$request->province;
        $data->city=$request->city;
        $data->address_detail=$request->address_detail;
        $data->save();

        return redirect('admin/location/' .$id. '/edit')->with('sukses', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        location::where('id', $id)->delete();
        return redirect('admin/location')->with('success', 'Data berhasil dihapus!');
    }
}

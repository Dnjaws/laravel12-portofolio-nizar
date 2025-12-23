<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Facility::all();
        return view('Facility.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Facility;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();

        return redirect('admin/facility/create')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Facility::find($id);
        return view('Facility.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Facility::find($id);
        return view('Facility.edit', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Facility::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();

        return redirect('admin/facility/' .$id. '/edit')->with('sukses', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Facility::where('id', $id)->delete();
        return redirect('admin/facility')->with('success', 'Data berhasil dihapus!');
    }
}

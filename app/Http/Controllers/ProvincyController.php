<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvincyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $data=Provinsi::all();
        return view('Province.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Province.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Provinsi;
        $data->provincy_name=$request->provincy_name;
        $data->save();

        return redirect('admin/province/create')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Provinsi::find($id);
        return view('Province.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Provinsi::find($id);
        return view('Province.edit', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Provinsi::find($id);
        $data->provincy_name=$request->provincy_name;
        $data->save();

        return redirect('admin/province/' .$id. '/edit')->with('sukses', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Provinsi::where('id', $id)->delete();
        return redirect('admin/province')->with('success', 'Data berhasil dihapus!');
    }
}

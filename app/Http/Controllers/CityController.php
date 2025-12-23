<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $data=Kota::all();
        return view('city.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $province=Provinsi::all();
        return view('city.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Kota;
        $data->city_name=$request->city_name;
        $data->provincy_id=$request->provincy_id;
        $data->save();

        return redirect('admin/city/create')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Kota::find($id);
        return view('city.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Kota::find($id);
        $province=Provinsi::all();
        return view('city.edit', ['data'=> $data, 'province'=>$province]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Kota::find($id);
        $data->city_name=$request->city_name;
        $data->provincy_id=$request->provincy_id;
        $data->save();

        return redirect('admin/city/' .$id. '/edit')->with('sukses', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kota::where('id', $id)->delete();
        return redirect('admin/city')->with('success', 'Data berhasil dihapus!');
    }
}

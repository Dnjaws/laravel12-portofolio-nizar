<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $data=Kecamatan::all();
        return view('state.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city=Kota::all();
        return view('state.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Kecamatan;
        $data->kecamatan_name=$request->kecamatan_name;
        $data->city_id=$request->city_id;
        $data->save();

        return redirect('admin/state/create')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Kecamatan::find($id);
        return view('state.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Kecamatan::find($id);
        $city=Kota::all();
        return view('state.edit', ['data'=> $data, 'city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Kecamatan::find($id);
        $data->kecamatan_name=$request->kecamatan_name;
        $data->city_id=$request->city_id;
        $data->save();

        return redirect('admin/state/' .$id. '/edit')->with('sukses', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kecamatan::where('id', $id)->delete();
        return redirect('admin/state')->with('success', 'Data berhasil dihapus!');
    }
}

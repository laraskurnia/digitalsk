<?php

namespace App\Http\Controllers;

use App\Models\Mpangkat;
use Illuminate\Http\Request;

class Cpangkat extends Controller
{
    public function index()
    {
        $pangkat = Mpangkat::get();
        return view('pangkat.index', compact('pangkat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pangkat.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:10',
        //     'periode' => 'required|string|max:255',
        //     'pangkat_lama' => 'required|string|max:255',
        //     'pangkat_baru' => 'required|in:Aktif,Tidak Aktif',
        //     'jabatan' => 'required|in:',
        //  ]);   
        Mpangkat::create([
            'nama'           => $request->nama,
            'periode'        => $request->periode,
            'pangkat_lama'   => $request->pangkat_lama,
            'pangkat_baru'   => $request->pangkat_baru,
            'jabatan'        => $request->jabatan,
        ]);
        return redirect()->route('pangkat.index')->with('success', 'Data kenaikan pangkat berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mpangkat $mpangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pangkat = Mpangkat::findOrFail($id);
        return view('pangkat.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pangkat = Mpangkat::findOrFail($id);
$pangkat->update([
'nama' => $request->nama,
'periode'=> $request->periode,
'pangkat_lama' => $request->pangkat_lama,
'pangkat_baru' => $request->pangkat_baru,
'jabatan' => $request->jabatan,
]);
return redirect()->route('pangkat.index')->with('success', 'Data kenaikan pangkat berhasil 
diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pangkat = Mpangkat::findOrFail($id);
        $pangkat->delete();
        return redirect()->route('pangkat.index')->with('success', 'Data kenaikan pangkat berhasil dihapus');
    }
}

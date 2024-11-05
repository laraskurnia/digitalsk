<?php

namespace App\Http\Controllers;

use App\Models\Mdigitalsk;
use Illuminate\Http\Request;

class Cdigitalsk extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $digitalsk = Mdigitalsk::all();
        return view('digitalsk.index', compact('digitalsk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('digitalsk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file_pdf' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
        ], [
            
        ]);

        // Menyimpan data ke database
        Mdigitalsk::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('digitalsk2.index')->with('status', [
            'judul' => 'Berhasil',
            'pesan' => 'Data Digital SK berhasil disimpan',
            'icon' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $digitalsk = Mdigitalsk::findOrFail($id);
        return view('digitalsk.edit', compact('digitalsk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            
            'nama_file' => 'required|string|max:255',
            'file_pdf' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
        ], [
            
        ]);

        // Update data digital sk ke database
        $digitalsk = Mdigitalsk::findOrFail($id);
        $digitalsk->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('digitalsk2.index')->with('status', [
            'judul' => 'Berhasil',
            'pesan' => 'Data Digital SK berhasil diupdate',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $digitalsk     = Mdigitalsk::findOrFail($id);
        $digitalsk->delete();

        return redirect()->route('digitalsk2.index')->with('status', [
            'judul' => 'Berhasil',
            'pesan' => 'Data Digital SK berhasil dihapus',
            'icon' => 'success'
        ]);
    }
}

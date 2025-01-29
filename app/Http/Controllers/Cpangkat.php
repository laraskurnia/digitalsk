<?php

namespace App\Http\Controllers;

use App\Models\MPangkat;
use Illuminate\Http\Request;

class Cpangkat extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pangkat
        $pangkat = MPangkat::all(); // Pastikan model sudah sesuai dengan tabel yang ada
        return view('pangkat.index', compact('pangkat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk tambah data
        return view('pangkat.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'pangkat_lama' => 'required|string|max:255',
            'pangkat_baru' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        // Menyimpan data ke database
        MPangkat::create([
            'nama' => $request->nama,
            'periode' => $request->periode,
            'pangkat_lama' => $request->pangkat_lama,
            'pangkat_baru' => $request->pangkat_baru,
            'jabatan' => $request->jabatan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pangkat.index')->with('status', [
            'judul' => 'Berhasil!',
            'pesan' => 'Data kenaikan pangkat berhasil disimpan.',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MPangkat $mpangkat)
    {
        // Tidak ada logika di sini dalam kode yang Anda kirimkan sebelumnya
        // Bisa ditambahkan untuk menampilkan detail data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mencari data berdasarkan ID
        $pangkat = MPangkat::findOrFail($id);
        return view('pangkat.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'pangkat_lama' => 'required|string|max:255',
            'pangkat_baru' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        // Mencari data berdasarkan ID
        $pangkat = MPangkat::findOrFail($id);

        // Update data di database
        $pangkat->update([
            'nama' => $request->nama,
            'periode' => $request->periode,
            'pangkat_lama' => $request->pangkat_lama,
            'pangkat_baru' => $request->pangkat_baru,
            'jabatan' => $request->jabatan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pangkat.index')->with('status', [
            'judul' => 'Berhasil!',
            'pesan' => 'Data kenaikan pangkat berhasil diperbarui.',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data berdasarkan ID dan menghapusnya
        $pangkat = MPangkat::findOrFail($id);
        $pangkat->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pangkat.index')->with('status', [
            'judul' => 'Berhasil!',
            'pesan' => 'Data kenaikan pangkat berhasil dihapus.',
            'icon' => 'success'
        ]);
    }
}

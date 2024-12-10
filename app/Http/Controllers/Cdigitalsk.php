<?php

namespace App\Http\Controllers;

use App\Models\Mdigitalsk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate(
            [
                'nama_file' => 'required|string|max:255',
                'file_pdf' => 'required|mimes:pdf',
                'tanggal_upload' => 'required|date',
            ]
        );

        $request->file('file_pdf')->storeAs('public/pdf', $request->file('file_pdf')->hashName());
        
        // Menyimpan data ke database
        $data['file_pdf'] = $request->file('file_pdf')->hashName();  
        Mdigitalsk::create($data);

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
    // Validasi data
    $data = $request->validate([
        'nama_file' => 'required|string|max:255',
        'file_pdf' => 'nullable|mimes:pdf', // nullable untuk mengizinkan file kosong saat tidak ada perubahan file
        'tanggal_upload' => 'required|date',
    ]);

    // Cari data di database
    $pdfRecord = Mdigitalsk::findOrFail($id);

    // Proses file baru jika ada
    if ($request->hasFile('file_pdf')) {
        // Hapus file lama dari storage
        Storage::delete('public/pdf/' . $pdfRecord->file_pdf);

        // Simpan file baru dan perbarui nama file di data
        $fileName = $request->file('file_pdf')->hashName();
        $request->file('file_pdf')->storeAs('public/pdf', $fileName);
        $data['file_pdf'] = $fileName;
    } else {
        // Jika tidak ada file baru, pertahankan nama file lama
        $data['file_pdf'] = $pdfRecord->file_pdf;
    }

    // Update data di database
    $pdfRecord->update($data);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('digitalsk2.index')->with('status', [
        'judul' => 'Berhasil',
        'pesan' => 'Data Digital SK berhasil diperbarui',
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

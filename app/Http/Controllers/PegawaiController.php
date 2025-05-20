<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
        
    }

    public function create()
    {
        return view('pegawai.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawai',
            'jabatan' => 'required',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

// public function edit($id)
// {
//     $pegawai = Pegawai::findOrFail($id);
//     return view('pegawai.edit', compact('pegawai'));
    
// }

public function edit(Pegawai $pegawai)
{
    return view('pegawai.edit', compact('pegawai'));
}

    // public function update(Request $request, Pegawai $pegawai)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
    //         'jabatan' => 'required',
    //     ]);

    //     $pegawai->update($request->all());
    //     return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    // }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
            'jabatan' => 'required',
        ]);

        $pegawai->update($request->only(['nama', 'nip', 'jabatan']));
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
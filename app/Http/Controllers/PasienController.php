<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::get();
        return view('pasien.index', compact('data'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|digits:16',
            'tanggal' => 'required',
            'diagnosis' => 'required',
        ]);

        Pasien::create($request->all());
        return redirect()->route('riwayat-pasien.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|digits:16',
            'tanggal' => 'required',
            'diagnosis' => 'required',
        ]);

        $data = Pasien::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Pasien::findOrFail($id);
        $data->delete();
        return redirect()->route('pasien.index')->with('success', 'Data berhasil dihapus.');
    }
}

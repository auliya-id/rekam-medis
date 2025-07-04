<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;

class DiagnosisController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $data = [];
        if ($query) {
            $data = Diagnosis::where('kode', 'like', "%{$query}%")
                ->orWhere('penjelasan_umum', 'like', "%{$query}%")
                ->get();
        }

        return view('diagnosis.index', compact('data', 'query'));
    }

    public function datatable()
    {
        $data = Diagnosis::get();
        return view('diagnosis.datatable', compact('data'));
    }

    public function create()
    {
        return view('diagnosis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'penjelasan_umum' => 'required',
            'kategori_bab' => 'required',
            'organ_terkait' => 'required',
            'definisi_penyakit' => 'required',
            'kategori_penyakit' => 'required',
            'kaidah_koding' => 'required',
            'hasil_anamnesis' => 'required',
            'hasil_pemeriksaan' => 'required',
            'penegakan_diagnosis' => 'required',
            'penatalaksanaan' => 'required',
        ]);

        Diagnosis::create($request->all());
        return redirect()->route('diagnosis.datatable')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Diagnosis::findOrFail($id);
        return view('diagnosis.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Diagnosis::findOrFail($id);
        return view('diagnosis.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'penjelasan_umum' => 'required',
            'kategori_bab' => 'required',
            'organ_terkait' => 'required',
            'definisi_penyakit' => 'required',
            'kategori_penyakit' => 'required',
            'kaidah_koding' => 'required',
            'hasil_anamnesis' => 'required',
            'hasil_pemeriksaan' => 'required',
            'penegakan_diagnosis' => 'required',
            'penatalaksanaan' => 'required',
        ]);

        $data = Diagnosis::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('diagnosis.datatable')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Diagnosis::findOrFail($id);
        $data->delete();
        return redirect()->route('diagnosis.datatable')->with('success', 'Data berhasil dihapus.');
    }
}

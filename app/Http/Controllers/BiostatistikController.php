<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biostatistik;
use App\Models\Diagnosis;

class BiostatistikController extends Controller
{
    public function index()
    {
        $data = Biostatistik::all();

        $total = $data->count();
        $diagnosisStats = $data->groupBy('diagnosis')->map(function ($item) use ($total) {
            return [
                'jumlah' => $item->count(),
                'persentase' => round(($item->count() / $total) * 100, 1)
            ];
        });

        return view('biostatistik.index', compact('data', 'diagnosisStats'));
    }

    public function create()
    {
        $data['diagnosis'] = Diagnosis::get();

        return view('biostatistik.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'diagnosis' => 'required'
        ]);

        Biostatistik::create($request->all());
        return redirect()->route('biostatistik.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Biostatistik::findOrFail($id);
        return view('biostatistik.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Biostatistik::findOrFail($id);
        $diagnosis = Diagnosis::get();

        return view('biostatistik.edit', compact('data', 'diagnosis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pasien' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'diagnosis' => 'required'
        ]);

        $data = Biostatistik::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('biostatistik.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Biostatistik::findOrFail($id);
        $data->delete();
        return redirect()->route('biostatistik.index')->with('success', 'Data berhasil dihapus.');
    }
}

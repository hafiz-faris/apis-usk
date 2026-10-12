<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        // Menggunakan oldest() agar data pertama/terlama tetap berada di paling atas
        $skemas = Skema::oldest()->paginate(10);
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema',
            'nm_skema' => 'required',
            'jenis'    => 'required',
            'jml_unit' => 'required|numeric',
        ]);

        Skema::create($request->all());
        return redirect()->route('skema.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema,' . $skema->id,
            'nm_skema' => 'required',
            'jenis'    => 'required',
            'jml_unit' => 'required|numeric',
        ]);

        $skema->update($request->all());
        return redirect()->route('skema.index')->with('success', 'Skema berhasil diubah.');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skema.index')->with('success', 'Skema berhasil dihapus.');
    }
}
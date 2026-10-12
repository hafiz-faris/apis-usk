<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('no_pendaftaran', 'like', "%{$search}%")
                             ->orWhere('nama_peserta', 'like', "%{$search}%")
                             ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->oldest() // Menggunakan oldest() agar data pertama/terlama tetap di paling atas
            ->paginate(10);

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran',
            'skema_id'       => 'required|exists:skemas,id',
            'nama_peserta'   => 'required',
            'email'          => 'required|email',
            'jns_kelamin'    => 'required|in:L,P',
            'alamat'         => 'required',
            'no_hp'          => 'required|numeric',
        ]);

        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        // Memuat relasi skema dan menampilkan view peserta.show
        $peserta->load('skema');
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran,' . $peserta->id,
            'skema_id'       => 'required|exists:skemas,id',
            'nama_peserta'   => 'required',
            'email'          => 'required|email',
            'jns_kelamin'    => 'required|in:L,P',
            'alamat'         => 'required',
            'no_hp'          => 'required|numeric',
        ]);

        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $items = Pemasok::all();
        return view('pemasok.index', compact('items'));
    }

    public function create()
    {
        return view('pemasok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPemasok' => 'required|string|max:100',
            'Alamat' => 'required|string|max:255',
            'NoTlp' => 'required|string|max:14',
            'KontakPerson' => 'required|string|max:50',
        ]);

        Pemasok::create($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil ditambahkan.');
    }

    public function show(Pemasok $pemasok)
    {

    }

    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit', compact('pemasok'));
    }

    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'NamaPemasok' => 'required|string|max:100',
            'Alamat' => 'required|string|max:255',
            'NoTlp' => 'required|string|max:14',
            'KontakPerson' => 'required|string|max:50',
        ]);

        $pemasok->update($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil diperbarui.');
    }

    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil dihapus.');
    }
}

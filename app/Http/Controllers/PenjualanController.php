<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'nama_slug' => 'required|string|max:255',
            'harga' => 'required|integer',
            'kategori' => 'string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'string',
        ]);

        if ($request->hasFile('foto_produk')) {
            $validated['foto_produk'] = $request->file('foto_produk')->store('foto_produks', 'public');
        }

        Penjualan::create($validated);

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.edit', compact('penjualan'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'nama_slug' => 'required|string|max:255',
            'harga' => 'required|integer',
            'kategori' => 'string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'string',
        ]);

        if ($request->hasFile('foto')) {
            if ($penjualan->foto) {
                Storage::disk('public')->delete($penjualan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_produk', 'public');
        }

        $penjualan->update($validated);

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil diupdate');
    }

    public function show($id)
    {
         $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.detail', compact('penjualan'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        if ($penjualan->foto_produk) {
            Storage::disk('public')->delete($penjualan->foto_produk);
        }

        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil dihapus');
    }
}

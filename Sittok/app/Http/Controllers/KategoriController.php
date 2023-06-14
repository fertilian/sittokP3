<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris=kategori::orderBy('created_at', 'DESC')->get();
        return view('Admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Ditambahkan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data Kategori Gagal Ditambahkan!!! silahkan isi semua field');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategoris = kategori::findOrFail($id);

        return view('Admin.kategori.show', compact('kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);

        return view('Admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kategori)
    {
        try {
        $kategori = Kategori::findOrFail($id_kategori);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Diupdate');
    }catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data Kategori Gagal Diupdate!!! silahkan isi semua field ');
    }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kategori)
    {
        try {
            $kategoris = kategori::findOrFail($id_kategori);

        $kategoris->delete();

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Dihapus');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Kategori Gagal Dihapus!!! parent row');
        }
        
    }
}

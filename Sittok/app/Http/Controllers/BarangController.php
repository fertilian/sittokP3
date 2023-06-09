<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs=barang::orderBy('created_at', 'DESC')->get();
        return view('Admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris=kategori::orderBy('created_at', 'DESC')->get();
        return view('Admin.barang.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') .".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "images/$profileImage";
        }

        barang::create($input);

        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        $kategoris=kategori::orderBy('created_at', 'DESC')->get();

        return view('Admin.barang.edit', compact('barang', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        $request->validate([
            'merk_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') .".".$image->getClientOriginalExtension();
            $image->move('images/', $profileImage);
            $input['gambar'] = "images/$profileImage";
        }

        $barang->update($input);
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_barang)
    {
        $barangs = barang::findOrFail($id_barang);

        $barangs->delete();

        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Dihapus');
    }
}
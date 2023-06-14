<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jual;
use App\Models\Barang;
use App\Models\Customer;
class JualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juals=jual::orderBy('created_at', 'DESC')->get();
        return view('Admin.jual.index', compact('juals'));

        $jual = Jual::find($id_jual);

        $nama_customer = $jual->customers->nama_customer;
        $merk_barang = $jual->barang->merk_barang;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs=barang::orderBy('created_at', 'DESC')->get();
        $customers=customer::orderBy('created_at', 'DESC')->get();
        return view('Admin.jual.create', compact('customers', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'tanggal_jual' => 'required',
            'id_barang' => 'required',
            'no_pesanan' => 'required',
            'id_customer' => 'required',
            'total' => 'required',
            'status'=> 'required',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('bukti_bayar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') .".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti_bayar'] = "$profileImage";
        }

        jual->create($input);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_barang += $request->jumlah_beli;
        $barang->save();
        return redirect()->route('jual.index')->with('success', 'Data Jual Berhasil Ditambahkan');
    }catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data Jual Gagal Ditambahkan!!!' . $e->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_jual)
    {
        $jual = Jual::findOrFail($id_jual);
      

        return view('Admin.jual.show', compact('jual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_jual)
    {
        $jual = Jual::findOrFail($id_jual);
        $barangs=barang::orderBy('created_at', 'DESC')->get();
        $customers=customer::orderBy('created_at', 'DESC')->get();

        return view('Admin.jual.edit', compact('jual', 'barangs', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jual)
    {
        try{
        $jual = Jual::findOrFail($id_jual);
        $request->validate([
            'tanggal_jual' => 'required',
            'id_barang' => 'required',
            'no_pesanan' => 'required',
            'id_customer' => 'required',
            'total' => 'required',
            'status'=> 'required',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('bukti_bayar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') .".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti_bayar'] = "$profileImage";
        }

        $jual->update($input);
        return redirect()->route('jual.index')->with('success', 'Data Jual Berhasil Diupdate');
    }catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data Jual Gagal Diupdate!!!' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jual)
    {
        try{
        $juals = jual::findOrFail($id_jual);

        $juals->delete();

        return redirect()->route('jual.index')->with('success', 'Data Jual Berhasil Dihapus');
    }catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data Jual Gagal Dihapus!!!' . $e->getMessage());
    }
    }
}

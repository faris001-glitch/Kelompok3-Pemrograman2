<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = \App\Barang::All();
        return view('admin.barang.barang', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_barang = new \App\Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->harga = $request->addharga;
        $tambah_barang->stok = $request->addstok;
        $tambah_barang->varian = $request->addvarian;
        $tambah_barang->save();
        Alert::success('Pesan ', 'Data Berhasil Disimpan');
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = \App\Barang::findOrFail($id);
        return view('admin.barang.editbarang', ['barang' => $barang]);
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
        $tambah_barang = \App\Barang::findOrFail($id);
        $tambah_barang->kd_brg = $request->get('addkdbrg');
        $tambah_barang->nm_brg = $request->get('addnmbrg');
        $tambah_barang->harga = $request->get('addharga');
        $tambah_barang->stok = $request->get('addstok');
        $tambah_barang->varian = $request->get('addvarian');
        $tambah_barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_brg)
    {
        $barang = \App\Barang::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan ', 'Data Berhasil Dihapus');
        return redirect()->route('barang.index');
    }
}

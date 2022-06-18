<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Alert; //untuk memanggil sweet alert

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = \App\Supplier::All();
        return view('admin.supplier.supplier', ['supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_supplier = new \App\Supplier();
        $tambah_supplier->kd_supp = $request->addkdsupp;
        $tambah_supplier->nm_supp = $request->addnmsupp;
        $tambah_supplier->alamat = $request->addalamat;
        $tambah_supplier->telepon = $request->addtelepon;
        $tambah_supplier->save();
        Alert::success('Pesan ', 'Data Berhasil Disimpan');
        return redirect()->route('supplier.index');
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
        $supp_edit = \App\Supplier::findOrFail($id);
        return view('admin.supplier.editsupplier', ['supplier' => $supp_edit]);
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
        $update_supp = \App\Supplier::findOrFail($id);
        $update_supp->kd_supp = $request->get('addkdsupp');
        $update_supp->nm_supp = $request->get('addnmsupp');
        $update_supp->alamat = $request->get('addalamat');
        $update_supp->telepon = $request->get('addtelepon');
        $update_supp->save();
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_supp)
    {
        $hapus_supp = \App\Supplier::findOrFail($kd_supp);
        $hapus_supp->delete();
        Alert::success('Pesan ', 'Data Berhasil Dihapus');
        return redirect()->route('supplier.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailOrder;
use App\Order;
use Alert;
use Illuminate\Queue\Events\Looping;
use Illuminate\Support\Facades\App;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function simpan(Request $request)
    {
        // Simpan ke table order
        $tambah_order = new Order;
        $tambah_order->no_order = $request->no_order;
        $tambah_order->tgl_order = $request->tgl;
        $tambah_order->total = $request->total;
        $tambah_order->kd_supp = $request->supp;
        $tambah_order->save();
        //SIMPAN DATA KE TABEL DETAIL
        $kd_brg = $request->kd_brg;
        $qty = $request->qty_pesan;
        $sub_total = $request->sub_total;
        if ($kd_brg)
        foreach ($kd_brg as $key => $no) {
            $input['no_order'] = $request->no_order;
            $input['kd_brg'] = $kd_brg[$key];
            $input['qty_pesan'] = $qty[$key];
            $input['subtotal'] = $sub_total[$key];
            DetailOrder::insert($input);
        }
        Alert::success('Pesan ', 'Data berhasil disimpan');
        return redirect('/order');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Barang;
use App\Supplier;
use App\Order;
use App\Temp_Order;
use App\Tem_Order;
use Alert;

class OrderController extends Controller
{
    public function index()
    {
        $akun = Akun::All();
        $barang = Barang::All();
        $supplier = Supplier::All();
        $tem_order = Tem_Order::All();
        //No otomatis untuk transaksi order
        $AWAL = 'O';
        $bulanRomawi = array(
            "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"
        );
        $noUrutAkhir = Order::max('no_order');
        $no = 1;
        $formatnya = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        return view(
            'order.order',
            [
                'barang' => $barang,
                'akun' => $akun,
                'supplier' => $supplier,
                'temp_order' => $tem_order,
                'formatnya' => $formatnya
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi jika barang sudah ada paada tabel temporari maka QTY akaan di edit
        if (Temp_Order::where('kd_brg', $request->brg)->exists()) {
            Alert::warning('Pesan ', 'barang sudah ada.. QTY akan terupdate ?');
            Temp_Order::where('kd_brg', $request->brg)->update(['qty_pesan' => $request->qty]);
            return redirect('order');
        } else {
            Temp_Order::create([
                'qty_pesan' => $request->qty,
                'kd_brg' => $request->brg,
            ]);
            return redirect('order');
        }
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
    public function destroy($kd_brg)
    {
        $barang = Temp_Order::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan', 'Data Berhasil Dihapus');
        return redirect('order');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\DetailBarangMasuk;
use App\BarangMasuk;
use App\Jurnal;
use DB;
use Alert;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = \App\Order::All();
        return view('barangmasuk.barangmasuk', ['order' => $order]);
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
    public function simpan(Request $request)
    {
        if (BarangMasuk::where('no_order', $request->no_order)->exists()) {
            Alert::warning('Pesan ', 'Terima Barang Telah Dilakukan ');

            return redirect('barangmasuk');
        } else {
            //Simpan ke table barang masuk
            $tambah_barangmasuk = new \App\BarangMasuk;
            $tambah_barangmasuk->no_bm = $request->nobm;
            $tambah_barangmasuk->tgl_bm = $request->tgl;
            $tambah_barangmasuk->nobm = $request->nobm;
            $tambah_barangmasuk->total = $request->total;
            $tambah_barangmasuk->no_order = $request->no_order;
            $tambah_barangmasuk->save();
            //SIMPAN DATA KE TABEL DETAIL BARANG MASUK
            $kdbrg = $request->kd_brg;
            $qtybm = $request->qty_bm;
            $subbm = $request->sub_bm;
            if ($kdbrg)
                foreach ($kdbrg as $key => $no) {
                    $input['no_bm'] = $request->nobm;
                    $input['kd_brg'] = $kdbrg[$key];
                    $input['qty_bm'] = $qtybm[$key];
                    $input['sub_bm'] = $subbm[$key];
                    DetailBarangMasuk::insert($input);
                }
            //SIMPAN ke table jurnal bagian debet
            $tambah_jurnaldebet = new Jurnal;
            $tambah_jurnaldebet->no_jurnal = $request->no_jurnal;
            $tambah_jurnaldebet->keterangan = 'Terima Barang';
            $tambah_jurnaldebet->tgl_jurnal = $request->tgl;
            $tambah_jurnaldebet->no_akun = $request->pembelian;
            $tambah_jurnaldebet->debet = $request->total;
            $tambah_jurnaldebet->kredit = '0';
            $tambah_jurnaldebet->save();

            //SIMPAN ke table jurnal bagian kredit
            $tambah_jurnalkredit = new Jurnal;
            $tambah_jurnalkredit->no_jurnal = $request->no_jurnal;
            $tambah_jurnalkredit->keterangan = 'Kas';
            $tambah_jurnalkredit->tgl_jurnal = $request->tgl;
            $tambah_jurnalkredit->no_akun = $request->kas;
            $tambah_jurnalkredit->debet = '0';
            $tambah_jurnalkredit->kredit = $request->total;
            $tambah_jurnalkredit->save();
            Alert::success('Pesan ', 'Data berhasil disimpan');
            return redirect('/barangmasuk');
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
        $AWAL = 'BM';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = \App\BarangMasuk::max('no_bm');
        $no = 1;
        $format = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        $AWALJurnal = 'JRU';
        $bulanRomawij = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhirj = \App\Jurnal::max('no_jurnal');
        $noj = 1;
        $formatj = sprintf("%03s", abs((int)$noUrutAkhirj + 1)) . '/' . $AWALJurnal . '/' . $bulanRomawij[date('n')] . '/' . date('Y');

        $decrypted = Crypt::decryptString($id);
        $detail = DB::table('tampil_order')->where('no_order', $decrypted)->get();
        $order = DB::table('order')->where('no_order', $decrypted)->get();
        $akunkas      = DB::table('setting')->where('nama_transaksi', 'Kas')->get();
        $akunpembelian      = DB::table('setting')->where('nama_transaksi', 'Pembelian')->get();
        return view('barangmasuk.beli', ['detail' => $detail, 'format' => $format, 'order' => $decrypted, 'order' => $order, 'formatj' => $formatj, 'kas' => $akunkas, 'pembelian' => $akunpembelian]);
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

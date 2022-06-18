<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\BarangKeluar;
use App\DetailBarangKeluar;
use App\BarangMasuk;
use App\Jurnal;
use DB;
use Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = BarangMasuk::All();
        return view('barangkeluar.barangkeluar', ['barangmasuk' => $barangmasuk]);
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
        $AWAL = 'BK';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = BarangKeluar::max('no_bk');
        $no = 1;
        $format = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        //No otomatis untuk jurnal
        $AWALJurnal = 'JRU';
        $bulanRomawij = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhirj = \App\Jurnal::max('no_jurnal');
        $noj = 1;
        $formatj = sprintf("%03s", abs((int)$noUrutAkhirj + 1)) . '/' . $AWALJurnal . '/' . $bulanRomawij[date('n')] . '/' . date('Y');
        $decrypted = Crypt::decryptString($id);
        $detail      = DB::table('tampil_barang_masuk')->where('no_bm', $decrypted)->get();
        $order   = DB::table('order')->where('no_order', $decrypted)->get();
        $akunkas      = DB::table('setting')->where('nama_transaksi', 'Kas')->get();
        $akunretur      = DB::table('setting')->where('nama_transaksi', 'Retur')->get();
        return view('barangkeluar.beli', ['beli' => $detail, 'format' => $format, 'no_order' => $decrypted, 'order' => $order, 'formatj' => $formatj, 'kas' => $akunkas, 'retur' => $akunretur]);
    }

    public function simpan(Request $request)
    {
        if (BarangKeluar::where('no_bk', $request->no_bk)->exists()) {
            Alert::warning('Pesan ', 'Barang Keluar sudah dilakukan ');
            return redirect('barangkeluar');
        } else {
            //SIMPAN DATA KE TABEL DETAIL PEMBELIAN
            $kdbrg  = $request->kd_brg;
            $qtybk = $request->qty_bk;
            $harga   = $request->harga;
            $total = 0;
            foreach ($kdbrg as $key => $no) {
                $input['no_bk']   = $request->no_bk;
                $input['kd_brg']  = $kdbrg[$key];
                $input['qty_bk']  = $qtybk[$key];
                $input['sub_bk']  = $harga[$key] * $qtybk[$key];
                DetailBarangKeluar::insert($input);
                $total = $harga[$key] * $qtybk[$key];
            }
            //Simpan ke table barang keluar
            $tambah_barangmasuk = new BarangKeluar;
            $tambah_barangmasuk->no_bk = $request->no_bk;
            $tambah_barangmasuk->tgl_bk = $request->tgl;
            $tambah_barangmasuk->ket_keluar = $request->keterangan;
            $tambah_barangmasuk->tbk = $total;
            $tambah_barangmasuk->save();
            //SIMPAN ke table jurnal bagian debet
            $tambah_jurnaldebet = new Jurnal;
            $tambah_jurnaldebet->no_jurnal = $request->no_jurnal;
            $tambah_jurnaldebet->keterangan = 'Kas';
            $tambah_jurnaldebet->tgl_jurnal = $request->tgl;
            $tambah_jurnaldebet->no_akun = $request->kas;
            $tambah_jurnaldebet->debet = $total;
            $tambah_jurnaldebet->kredit = '0';
            $tambah_jurnaldebet->save();

            //SIMPAN ke table jurnal bagian kredit
            $tambah_jurnalkredit = new Jurnal;
            $tambah_jurnalkredit->no_jurnal = $request->no_jurnal;
            $tambah_jurnalkredit->keterangan = 'Terima Barang Keluar';
            $tambah_jurnalkredit->tgl_jurnal = $request->tgl;
            $tambah_jurnalkredit->no_akun = $request->retur;
            $tambah_jurnalkredit->debet = '0';
            $tambah_jurnalkredit->kredit = $total;
            $tambah_jurnalkredit->save();
            Alert::success('Pesan ', 'Data berhasil disimpan');
            return redirect('/barangkeluar');
        }
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

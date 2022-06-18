@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Barang Keluar </h1>
</div>
<hr>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th width="15%">No Barang Keluar</th>
                        <th>Tanggal Barang Keluar</th>
                        <th>Total</th>
                        <th width="30%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangmasuk as $beli)
                    <tr>
                        <td width="15%">{{ $beli->nobm }}</td>
                        <td>{{ $beli->tgl_bm }}</td>
                        <td>Rp. {{ number_format($beli->total) }}</td>
                        <td width="30%">
                            <a href="{{url('/barangkeluar-beli/'.Crypt::encryptString($beli->nobm))}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-recycle fa-sm text-white-50"></i> Barang Keluar</a>
                            <a href="/akun/hapus/{{$beli->no_order}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> HAPUS</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
@endsection
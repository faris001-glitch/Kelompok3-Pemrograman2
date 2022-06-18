@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Transaksi Barang Masuk</h3>
            </div>
            <div class="panel-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="card-body">
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="15%">No Barang Masuk</th>
                                        <th>Tanggal Barang Masuk</th>
                                        <th>Supplier</th>
                                        <th width="30%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $pesan)
                                    <tr>
                                        <td width="15%">{{ $pesan->no_order }}</td>
                                        <td>{{ $pesan->tgl_order }}</td>
                                        <td>{{ $pesan->kd_supp }}</td>
                                        <td width="30%">
                                            <a href="{{url('/barangmasuk-beli/'.Crypt::encryptString($pesan->no_order))}}" class="d-none d-sm-inline-block btn btn-gradient btn-success shadow-sm"><i class="fa fa-edit"></i> Terima Barang</a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
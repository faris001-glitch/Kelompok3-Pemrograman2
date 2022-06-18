@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Barang Masuk </h1>
</div>
<hr>
<form action="/barangmasuk/simpan" method="POST">
    @csrf
    <div class="form-group col-sm-4">
        <label for="exampleFormControlInput1">No Barang Masuk</label>
        @foreach($kas as $ks)
        <input type="hidden" name="kas" value="{{ $ks->no_akun }}" class="form-control" id="exampleFormControlInput1">
        @endforeach
        @foreach($pembelian as $bli)
        <input type="hidden" name="pembelian" value="{{ $bli->no_akun }}" class="form-control" id="exampleFormControlInput1">
        @endforeach
        <input type="hidden" name="no_jurnal" value="{{ $formatj }}" class="form-control" id="exampleFormControlInput1">
        <input type="text" name="nobm" value="{{ $format }}" class="form-control" id="exampleFormControlInput1">
    </div>
    @foreach($order as $der)
    <div class="form-group col-sm-4">
        <label for="exampleFormControlInput1">No Order</label>
        <input type="text" name="no_order" value="{{ $der->no_order }}" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="form-group col-sm-4">
        <label for="exampleFormControlInput1">Tanggal Order</label>
        <input type="text" min="1" name="tgl" value="{{ $der->tgl_order }}" id="addnmbrg" class="form-control" id="exampleFormControlInput1" require>
    </div>
    @endforeach
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                        @foreach($detail as $temp)
                        <tr>
                            <td><input name="no_bm[]" class="form-control" type="hidden" value="{{$temp->no_order}}" readonly>{{$temp->no_order}}</td>
                            <td><input name="kd_brg[]" class="form-control" type="hidden" value="{{$temp->kd_brg}}" readonly>{{$temp->kd_brg}}</td>
                            <td><input name="qty_bm[]" class="form-control" type="hidden" value="{{$temp->qty_pesan}}" readonly>{{$temp->qty_pesan}}</td>
                            <td> <input name="sub_bm[]" class="form-control" type="hidden" value="{{$temp->sub_total}}" readonly>{{$temp->sub_total}}</td>
                            <td align="center">
                                <a href="/barangmasuk/hapus/{{$temp->kd_brg}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                            </td>
                        </tr>
                        @php($total += $temp->sub_total)
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td><input name="total" class="form-control" type="hidden" value="{{$total}}">Total {{number_format($total)}}</a>
                            <td></td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="submit" class="btn btn-primary btn-send" value="Simpan Barang Masuk">
        </div>
    </div>
</form>
@endsection
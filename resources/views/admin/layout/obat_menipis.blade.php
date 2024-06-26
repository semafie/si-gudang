@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card obat_menipis">
      <a href="/cobakcetak" target="_blank"><button type="button" class="btn btn-warning">Cetak stok menipis</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                    <th>id</th>
                    <th>nama Barang</th>
                    <th>harga Barang</th>
                    <th>jumlah stok</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                  </tr>
              @endforeach
            </tbody>
            </table>
        </div>
    </div>

  </div>

  @endsection
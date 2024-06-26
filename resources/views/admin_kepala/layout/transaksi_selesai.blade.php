@extends('admin_kepala.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card laporanss">
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>tanggal</th>
                  <th>jam</th>
                  <th>total_harga</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pembelian as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->status }}</td>
                    <td style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-success" onclick="filterTable({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#detail">detail</button>
                        <form action="/cetaklaporans/{{ $item->id }}" method="POST" target="_blank">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-warning">print</button>
                        </form>
                        <form action="">
                        <button type="submit" class="btn btn-danger">hapus</button>
                    </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>

        <div class="modal fade" id="detail" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel">detail Pembelian</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_pembelians">
                    <div class="text-nowrap table-responsive pt-0">
                        <table id="halo"  class="datatables-basic table border-top">
                          <thead>
                            <tr>
                                <th>id_pembelian  </th>
                                <th>nama obat</th>
                                <th>harga obat</th>
                                <th>jumlah beli</th>
                                <th>sub total</th>
                            </tr>
                          </thead>
                          <tbody id="table-body">
                            @foreach($detail_pembelian as $detail)
                            <tr data-id-pembelian="{{ $detail->id_pembelian }}">
                                <td>{{ $detail->id_pembelian }}</td>
                                <td>{{ $detail->nama_obat }}</td>
                                <td>{{ $detail->harga_obat }}</td>
                                <td>{{ $detail->jumlah_stok }}</td>
                                <td>{{ $detail->sub_total }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>

    </div>
</div>

<script>
    function filterTable(idPembelian) {
        const rows = document.querySelectorAll('#table-body tr');
        rows.forEach(row => {
            if (row.getAttribute('data-id-pembelian') == idPembelian) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
  </script>

<script>
    let table = new DataTable('#myTable');
</script>
@endsection
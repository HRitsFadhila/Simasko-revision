@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Daftar Barang</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('dbarang.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <th width = "5%" class="text-center">No</th>
            <th width = "15%" class="text-center">Kode Barang</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Supplier</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga Beli</th>
            <th width = "10%" class="text-center"><i class="fas fa-cog"></i></th>
          </thead>
          <tbody>
            @foreach ($dBarang as $key => $item)
                <tr>
                  <td class="text-center">{{ $key + 1 }}</td>
                  <td class="text-center">{{ $item->kd_barang }}</td>
                  <td>{{ $item->kategoribarang->nama_kategori }}</td>
                  <td>{{ $item->supplier->nama }}</td>
                  <td>{{ $item->nama }}</td>
                  <td class="text-center">{{ $item->jumlah ?? '0' }}</td>
                  <td>{{ $item->satuan }}</td>
                  <td>{{ 'Rp ' . number_format($item->harga_beli, 0, ',', '.') }}</td>
                  <td class="text-center">
                    <a href="{{ route('dbarang.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    <!-- Tombol untuk menampilkan modal -->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-url="{{ route('dbarang.destroy', $item->id) }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@include('dbarang.modal-delete')

@if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: '{{ session('success') }}',
          showConfirmButton: false,
          timer: 3000
      });
  </script>
@endif

@if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: '{{ session('error') }}',
          showConfirmButton: false,
          timer: 3000
      });
  </script>
@endif
@endsection


@push('script')

<script>
  $('.table').DataTable()
</script>
@endpush
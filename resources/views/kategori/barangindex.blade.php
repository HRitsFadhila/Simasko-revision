@extends('layouts.app')

@section('title', 'Kategori Barang')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kategori</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('kbarang.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <th width = "5%" class="text-center">No</th>
            <th >Nama</th>
            <th width = "15%" class="text-center"><i class="fas fa-cog"></i></th>
          </thead>
          <tbody>
            @foreach ($kategoriBarang as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->nama_kategori }}</td>
                  <td class="text-center">
                    <a href="{{ route('kbarang.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    <!-- Tombol untuk menampilkan modal -->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-url="{{ route('kbarang.destroy', $item->id) }}">
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

@include('kategori.modal-deletebarang')

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
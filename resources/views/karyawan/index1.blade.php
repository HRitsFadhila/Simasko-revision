@extends('layouts.app')

@section('title', 'Data Karyawan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Karyawan</a></li>
@endsection

@section('content')
<div class="col-md-12">
  <div class="panel panel-flat">
      <div class="panel-heading">
          <a href="{{ route('karyawan.create') }}" class="btn btn-primary"><i class="icon-file-plus"></i> Tambah Karyawan Baru</a>
      </div>

      <div class="panel-body">
          <div class="text-right mb-4">
              <form action="{{ route('karyawan.details') }}" method="GET">
                  <input type="hidden" name="page" value="{{ $karyawan->currentPage() }}">
              </form>
          </div>
          <table class="table table-bordered table-striped table-hover">
              <thead class="bg-primary">
                  <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Karyawan</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Gaji</th>
                      <th>Foto</th>
                      <th>Kewarganegaraan</th>
                      <th>Umur</th>
                      <th>Jenis Kelamin</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($karyawan as $index => $row)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $row->nama_karyawan }}</td>
                          <td>{{ $row->no_telepon }}</td>
                          <td>{{ $row->alamat }}</td>
                          <td>{{ $row->gaji }}</td>
                          <td>
                              @if ($row->foto)
                                  <img src="{{ asset('storage/foto/' . $row->foto) }}" alt="Foto Karyawan" style="max-width: 200px;">
                              @else
                                  <p>Tidak ada foto</p>
                              @endif
                          </td>
                          <td>{{ $row->kewarganegaraan }}</td>
                          <td>{{ $row->umur }}</td>
                          <td>{{ $row->jenis_kelamin }}</td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('karyawan.edit', $row->id) }}" class="btn btn-sm btn-primary"><i class="icon-pencil7"></i> Edit</a>
                                  <form action="{{ route('karyawan.delete', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i> Delete</button>
                                  </form>
                              </div>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="10" class="text-center">Data Kosong</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
      <!-- /.card-body -->
  </div>
  <!-- /basic datatable -->
</div>

@include('karyawan.modal-delete')

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

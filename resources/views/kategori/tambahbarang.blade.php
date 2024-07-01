@extends('layouts.app')

@section('title', 'Tambah Kategori Barang')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ '/kbarang'}}">Kategori</a></li>
    <li class="breadcrumb-item active">Tambah</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('kbarang.index') }}" method="POST">
      @csrf
      <div class="card">
        <div class="card-body">
         <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kategori" required>
          @if($errors->has('nama'))
            <div class="text-danger">
              {{ $errors->first('nama')}}
              </div>
          @endif
         </div>
        </div>
        <div class="card-footer">
          <button type="reset" class="btn btn-dark">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@push('script')

@endpush
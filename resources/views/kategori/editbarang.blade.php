@extends('layouts.app')

@section('title', 'Edit Kategori Barang ')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('kbarang.index') }}">Kategori</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('kbarang.update', $kategoriBarang->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kategori" required value="{{ $kategoriBarang->nama_kategori }}">
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

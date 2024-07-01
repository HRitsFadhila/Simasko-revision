@extends('layouts.app')

@section('title', 'Edit Supplier ')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Kategori</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
      <form action="{{ route('supplier.update', ['supplier' => $supplier->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
           <div class="form-group">
            <label for="nama">Nama Supplier</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Supplier" required value="{{ $supplier->nama }}">
            @if($errors->has('nama'))
              <div class="text-danger">
                {{ $errors->first('nama')}}
                </div>
            @endif
           </div>
           <div class="form-group">
            <label for="no_telp">Nomor Handphone</label>
            <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Handphone" required value="{{ $supplier->no_telp }}">
            @if($errors->has('no_telp'))
              <div class="text-danger">
                {{ $errors->first('no_telp')}}
                </div>
            @endif
           </div>
           <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>{{ $supplier->alamat }}</textarea>
            @if($errors->has('alamat'))
              <div class="text-danger">
                {{ $errors->first('alamat') }}
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

@extends('layouts.app')

@section('title', 'Tambah Supplier')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ '/supplier'}}">Kategori</a></li>
    <li class="breadcrumb-item active">Tambah</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('supplier.index') }}" method="POST">
      @csrf
      <div class="card">
        <div class="card-body">
         <div class="form-group">
          <label for="nama">Nama Supplier</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Supplier" required>
          @if($errors->has('nama'))
            <div class="text-danger">
              {{ $errors->first('nama')}}
              </div>
          @endif
         </div>
         <div class="form-group">
          <label for="no_telp">Nomor Handphone</label>
          <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Handphone" required>
          @if($errors->has('no_telp'))
            <div class="text-danger">
              {{ $errors->first('no_telp')}}
              </div>
          @endif
         </div>
         <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required></textarea>
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

@push('script')

@endpush
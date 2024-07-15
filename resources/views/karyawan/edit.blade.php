@extends('layouts.app')

@section('title', 'Edit Karyawan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required>
                        @if($errors->has('nama_karyawan'))
                            <div class="text-danger">
                                {{ $errors->first('nama_karyawan') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="{{ $karyawan->no_telepon }}" required>
                        @if($errors->has('no_telepon'))
                            <div class="text-danger">
                                {{ $errors->first('no_telepon') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $karyawan->alamat }}" required>
                        @if($errors->has('alamat'))
                            <div class="text-danger">
                                {{ $errors->first('alamat') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="text" name="gaji" class="form-control" id="gaji" value="{{ $karyawan->gaji }}" required>
                        @if($errors->has('gaji'))
                            <div class="text-danger">
                                {{ $errors->first('gaji') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control-file" id="foto">
                        @if ($karyawan->foto)
                            <img src="{{ asset('storage/foto/' . $karyawan->foto) }}" alt="Foto Karyawan" class="img-thumbnail " style="max-width: 200px; ">
                        @else
                            <p class="mt-2">Tidak ada foto tersimpan.</p>
                        @endif
                        @if($errors->has('foto'))
                            <div class="text-danger">
                                {{ $errors->first('foto') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" class="form-control" id="umur" value="{{ $karyawan->umur }}">
                        @if($errors->has('umur'))
                            <div class="text-danger">
                                {{ $errors->first('umur') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                            <option value="Laki-laki" @if ($karyawan->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if ($karyawan->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                        @if($errors->has('jenis_kelamin'))
                            <div class="text-danger">
                                {{ $errors->first('jenis_kelamin') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
@endpush

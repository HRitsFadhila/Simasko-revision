@extends('layouts.app')

@section('title', 'Tambah User')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ '/pengguna'}}">Pengguna</a></li>
    <li class="breadcrumb-item active">Tambah</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('pengguna.index') }}" method="POST">
      @csrf
      <div class="card">
        <div class="card-body">
         <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ old('nama') }}" required>
          @if($errors->has('nama'))
            <div class="text-danger">
              {{ $errors->first('nama')}}
              </div>
          @endif
         </div>
         <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ old('username') }}" required>
            @if($errors->has('username'))
              <div class="text-danger">
                {{ $errors->first('username')}}
                </div>
            @endif
           </div>
           <div class="form-group">
            <label for="nama">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
              <div class="text-danger">
                {{ $errors->first('email')}}
                </div>
            @endif
            {{-- <div class="form-group">
                <label>Level</label><br>
                @foreach($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role{{ $role->id }}" value="{{ $role->id }}">
                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                @if($errors->has('role'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('role') }}
                    </div>
                @endif
            </div> --}}
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('level') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                @if($errors->has('password'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                @if($errors->has('password_confirmation'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('password_confirmation') }}
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
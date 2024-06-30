@extends('layouts.app')

@section('title', 'Edit User ')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('pengguna.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required value="{{ $user->name }}">
            @if($errors->has('nama'))
              <div class="text-danger">
                {{ $errors->first('nama')}}
              </div>
            @endif
            <div class="form-group">
                <label for="nama">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required value="{{ $user->username }}">
                @if($errors->has('username'))
                  <div class="text-danger">
                    {{ $errors->first('username')}}
                  </div>
                @endif
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{ $user->email }}">
                        @if($errors->has('email'))
                          <div class="text-danger">
                            {{ $errors->first('email')}}
                          </div>
                        @endif
                        <div class="form-group">
                          <label for="level">Level</label>
                          <select name="level" id="level" class="form-control">
                              @foreach ($roles as $role)
                                  <option value="{{ $role->id }}" {{ $user->id_role == $role->id ? 'selected' : '' }}>
                                      {{ $role->name }}
                                  </option>
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
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            @if($errors->has('password'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password">
                            @if($errors->has('password_confirmation'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                    </div>
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

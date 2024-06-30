<form action="{{ route('user-profile-information.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">
                        <img src="{{ auth()->user()->path_image ? asset('storage/' . auth()->user()->path_image) : 'path/to/default/image.jpg' }}" alt="" class="img-thumbnail preview-path_image" width="200">
                    </div>
                    <div class="form-group mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="path_image" name="path_image" onchange="preview('.preview-path_image', this.files[0])">
                            <label class="custom-file-label" for = "path_image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->name }}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ auth()->user()->username }}">
                @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ auth()->user()->email }}">
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

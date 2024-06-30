<form action="{{ route('user-password.update') }}" method="post">
    @csrf
    @method('put')

    <x-card>
        <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">
                        <img src="{{ url(auth()->user()->path_image ?? '') }}" alt="" class="img-thumbnail preview-path_image" width="200">
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
</form>
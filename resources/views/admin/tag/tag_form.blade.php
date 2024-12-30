<x-admin-layout>
    <div class="header-title">
        <h1 class="h5 text-center">Etiket Yönetimi</h1>
    </div>

    <div class="col-12 col-sm-6 offset-sm-3">
        <form method="post" action="{{route('tag.store')}}" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="name">Tanım</label>
                <input type="text" name="name" id="name" value="{{ old('name' ?? '') }}" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Kaydet</button>
        </form>
    </div>
</x-admin-layout>

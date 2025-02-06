<x-admin-layout>
    <div class="header-title">
        <h1 class="h5 text-center">Kullanıcı Yönetimi</h1>
    </div>

    <div class="col-12 col-sm-6 offset-sm-3">
        <form method="post" action="{{route('admin.user.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name">Ad Soyad</label>
                <input type="text" name="name" id="name" value="{{ old('name' ?? '') }}" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">E-posta</label>
                <input type="email" name="email" id="email" value="{{ old('email' ?? '') }}" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Şifre</label>
                <input type="password" name="password" id="password" value="{{ old('password' ?? '') }}" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rank_id">Yetki</label>
                <select class="form-select" name="rank_id">
                    @foreach ($rank_enum as $rank)
                        <option value="{{ $rank->id() }}" {{ (old('rank_id') === $rank->id()) ? 'selected' : '' }}>
                            {{ $rank->label() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary w-100">Kaydet</button>
        </form>
    </div>
</x-admin-layout>

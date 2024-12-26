<form action="{{ isset($item) ? route('company.store', $item->id) : route('company.store') }}"
      method="POST"
      enctype="multipart/form-data"
      autocomplete="off">
    @csrf
    @if (isset($item))
        @method('PUT')
    @endif

    <!-- Ünvan -->
    <div class="mb-3">
        <label for="name" class="{{ $errors->has('name') ? 'text-danger' : '' }}">Ünvan</label>
        <input type="text"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               name="name"
               id="name"
               placeholder="Firma ünvanı"
               value="{{ old('name', $item->name ?? '') }}">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Website -->
    <div class="mb-3">
        <label for="webpage" class="{{ $errors->has('webpage') ? 'text-danger' : '' }}">Website</label>
        <input type="text"
               class="form-control {{ $errors->has('webpage') ? 'is-invalid' : '' }}"
               name="webpage"
               id="webpage"
               placeholder="Firma internet sitesi"
               value="{{ old('webpage', $item->webpage ?? '') }}">
        @error('webpage')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Açıklama -->
    <div class="mb-3">
        <label for="desc" class="{{ $errors->has('desc') ? 'text-danger' : '' }}">Açıklama</label>
        <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}"
                  name="desc"
                  id="desc"
                  placeholder="Firma açıklama">{{ old('desc', $item->desc ?? '') }}</textarea>
        @error('desc')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Şehir -->
    <div class="mb-3">
        <label for="city_id" class="{{ $errors->has('city_id') ? 'text-danger' : '' }}">Şehir</label>
        <select class="form-select {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                name="city_id"
                id="city_name">
            <option value="">Seçim Yapın...</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}"
                    {{ old('city_id', $item->city_id ?? '') == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
        @error('city_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Logo -->
    <div class="mb-3">
        <label for="logo" class="{{ $errors->has('logo') ? 'text-danger' : '' }}">Logo</label>
        <input type="file"
               class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
               name="logo"
               id="logo"
               placeholder="Firma logosu">
        @if (isset($item) && $item->logo)
            <img src="{{ asset('storage/' . $item->logo?->path) }}" alt="Mevcut Logo" style="max-height: 100px; margin-top: 10px;">
        @endif
        @error('logo')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Franchising -->
    <div class="mb-3">
        <label for="franchising" class="{{ $errors->has('franchising') ? 'text-danger' : '' }}">Franchising</label>
        <select class="form-select {{ $errors->has('franchising') ? 'is-invalid' : '' }}"
                name="franchising"
                id="franchising">
            <option value="">Seçim Yapın...</option>
            <option value="0" {{ old('franchising', $item->franchising ?? '') == 0 ? 'selected' : '' }}>Hayır</option>
            <option value="1" {{ old('franchising', $item->franchising ?? '') == 1 ? 'selected' : '' }}>Evet</option>
        </select>
        @error('franchising')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Tag Input -->
    <div class="mb-3">
        @include('admin.company.tag-input')
    </div>

    <!-- Hidden User ID -->
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100 mt-3">
        {{ isset($item) ? 'Güncelle' : 'Kaydet' }}
    </button>
</form>

<form action="{{ isset($item) ? route('admin.company.store', $item->id) : route('admin.company.store') }}"
      method="POST"
      enctype="multipart/form-data"
      autocomplete="off">
    @csrf


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
        <div class="d-flex">
            <input type="text"
                class="form-control me-2 {{ $errors->has('webpage') ? 'is-invalid' : '' }}"
                name="webpage"
                id="webpage"
                placeholder="Firma internet sitesi"
                value="{{ old('webpage', $item->webpage ?? '') }}">
            <button type="button" class="btn btn-danger ai-start">
                <i class="fa-solid fa-microchip"></i>
            </button>
        </div>

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

        <label for="logo" class="{{ $errors->has('logo') ? 'text-danger' : '' }}">Firma logosu</label>
        <input type="file"
               class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
               name="logo"
               id="logo"
               placeholder="Firma logosu">
        <div class="logo-content">
        @if (isset($item) && $item->logo)
            <a href="{{ asset($item->logo?->path) }}" target="_blank" class="company-logo-link btn btn-link text-dark text-decoration-none ps-0">
                <img src="{{ asset($item->logo?->path) }}" class="logo-img" alt="Firma logosu">
            </a>
            <button type="button" class="btn btn-sm btn-danger remove-file">Sil</button>
        @endif
        </div>
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

@push('javascript')
<script>
jQuery(function($) {
    const $webpage = $('input[name=webpage]');
    const $aiButton = $('.ai-start');

    function validateUrl(url) {
        const urlPattern = /^(https?:\/\/)?([\w\d-]+\.)+[\w\d]{2,}(:\d+)?(\/.*)?$/i;
        return urlPattern.test(url);
    }
    function toggleDisabled() {
        let url = $webpage.val().trim();
        if (validateUrl(url)) {
            $aiButton.removeAttr('disabled');
        } else {
            $aiButton.attr('disabled', 'disabled');
        }
    }

    toggleDisabled();

    $webpage.on('input', toggleDisabled);

    $('.ai-start').click(function() {
        const popup = Swal.fire({
            icon: 'info',
            title: 'Lütfen Bekleyin',
            text: "Ai'nin sunucuda bilgilerin işlenmesi biraz zaman alabilir. Beklediğiniz için teşekkürler.",
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
        });

        const formData = new FormData();
        formData.append('webpage', $('input[name=webpage]').val());

        $.ajax({
            url: "{{ route('admin.ai.ask') }}",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.error) {
                    Swal.fire({
                        title: response.error.type ?? "Oooopsss!",
                        text: response.error.message ?? "API isteğinde bir hata oluştu!",
                        icon: "error"
                    });
                    return;
                }
                const contentRaw = response.choices[0].message.content;
                let contentClean = contentRaw.replace(/^```json\s+|\s+```$/g, "");
                let content = JSON.parse(contentClean);
                $("select[name='franchising']").val(content.franchise === "Yes" ? "1" : "0");

                console.log(content);

                $('input[name=name]').val(content.business_name);
                $('textarea[name=desc]').val(content.about_summary);

                $("select[name=city_id] option").each(function() {
                    if (Number($(this).val()) === Number(content.city_code)) {
                        $(this).prop("selected", true);
                    }
                });





                content.sectors.forEach(function(sector) {
                    let sector_en = sector.en.trim().toLowerCase();
                    let tagHtml = `<span class="tag">${sector_en}<button class="remove-tag">×</button><input type="hidden" name="tags[]" value="${sector_en}"></span>`;


                    $(".selected-tags").append(tagHtml);
                });

                popup.close();
            },
            error: function (xhr, status, error) {
                console.error("Hata:", error);
                Swal.fire({
                    title: "Oooopsss!",
                    text: "API isteğinde bir hata oluştu!",
                    icon: "error"
                });
            }
        });
    });
});

</script>
@endpush

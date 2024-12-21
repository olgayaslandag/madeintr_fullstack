<x-admin-layout>
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3">
            <h1 class="h4">{{ isset($item) ? 'Şirketi Düzenle' : 'Yeni Şirket Ekle' }}</h1>
            @include('admin.company.company-form')
        </div>
    </div>
    <div class="mb-5"></div>
</x-admin-layout>

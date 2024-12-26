<x-admin-layout>
    <div class="container">
        <h1 class="h4 text-center fw-bold">{{ isset($item) ? 'Şirketi Düzenle' : 'Yeni Şirket Ekle' }}</h1>
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3">
                @include('admin.company.company-form')
            </div>
        </div>
    </div>
</x-admin-layout>

<x-admin-layout>
    <div class="header-title">
        <div class="float-start">
            <h1 class="h5">Şirket Yönetimi</h1>
        </div>
        <div class="float-end">
            <a href="{{route('admin.company.create')}}" class="btn btn-outline-secondary">
                <span class="me-2">Yeni</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <table class="table table-hover d-table">
        <thead>
        <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Ünvan</th>
            <th scope="col">Etiketler</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Franchising</th>
            <th scope="col">Logo</th>
            <th scope="col" width="150">Şehir</th>
            <th scope="col" width="50"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $company)
            <tr>
                <td scope="row">{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>
                    @foreach($company->tags as $tag)
                        <span class="badge badge-sm text-bg-secondary me-1">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $company->desc }}</td>
                <td>
                    {!! $company->franchising
                        ? '<i class="fa-solid fa-check text-success"></i>'
                        : '<i class="fa-solid fa-xmark text-danger"></i>' !!}
                </td>

                <td>
                    @if(optional($company->logo)->path)
                        <a href="{{ optional($company->logo)->path }}" class="badge text-bg-primary text-decoration-none">Link</a>
                    @else
                        <span class="badge text-bg-secondary">Yok</span>
                    @endif
                </td>

                <td>{{ optional($company->city)->name ?? '-' }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <div class="me-1">
                        <a href="{{ route('admin.company.edit', ['id' => $company->id]) }}" class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        </div>
                        <form action="{{ route('admin.company.delete', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $company->id }}">
                            <button type="submit" class="btn btn-sm btn-danger sil">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admin-layout>

<x-admin-layout>
    <div class="header-title">
        <div class="float-start">
            <h1 class="h5">Kullanıcı Yönetimi</h1>
        </div>
        <div class="float-end">
            <a href="{{route('company.create')}}" class="btn btn-outline-secondary">
                <span class="me-2">Yeni</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Adsoyad</th>
            <th scope="col">Eposta</th>
            <th scope="col">Firma</th>
            <th scope="col">Yetki</th>
            <th scope="col">Durum</th>
            <th scope="col" width="50"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td scope="row">{{ $user->name }}</td>
                <td scope="row">{{ $user->email }}</td>
                <td scope="row">{{ $user->company_id ?? null }}</td>
                <td scope="row">{{ $user->permission_id }}</td>
                <td scope="row">{{ $user->status_id }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <div class="me-1">
                        <a href="{{ route('company.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        </div>
                        <form action="{{ route('company.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $user->id }}">
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

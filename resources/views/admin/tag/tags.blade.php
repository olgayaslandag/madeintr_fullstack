<x-admin-layout>
    <div class="header-title">
        <div class="float-start">
            <h1 class="h5">Kullanıcı Yönetimi</h1>
        </div>
        <div class="float-end">
            <a href="{{route('user.create')}}" class="btn btn-outline-secondary">
                <span class="me-2">Yeni</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Ad</th>
            <th scope="col" width="50"></th>
            <th scope="col" width="50"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td scope="row">{{ $tag->id }}</td>
                <td scope="row">{{ $tag->name }}</td>
                <td scope="row">{{ $tag->usage_count }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <div class="me-1">
                        <a href="{{ route('user.edit', ['id' => $tag->id]) }}" class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        </div>
                        <form action="{{ route('company.delete', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $tag->id }}">
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

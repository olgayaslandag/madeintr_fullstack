<x-admin-layout>
    <div class="header-title">
        <div class="float-start">
            <h1 class="h5">Etiket Yönetimi</h1>
        </div>
        <div class="float-end">
            <a href="{{route('admin.tag.category.form')}}" class="btn btn-outline-secondary">
                <span class="me-2">Yeni</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <table class="table table-hover d-table">
        <thead>
        <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Ad</th>
            <th scope="col" width="50"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td scope="row">{{ $item->name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <div class="me-1">
                        <a href="{{ route('admin.tag.category.form', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        </div>
                        <form action="{{ route('admin.tag.category.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $item->id }}">
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

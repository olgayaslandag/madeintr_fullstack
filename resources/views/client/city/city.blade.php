<x-client-layout>
    <div class="container">
        <h1 class="fw-bold my-5 text-center">{{ $city->name }}</h1>

        <div>
            <ul class="list-unstyled companies">
                @foreach ($companies as $item)
                    <li>
                        <a href="{{ route('company.get', $item->id) }}" class="text-decoration-none text-dark">
                            <div class="d-flex">
                                <figure class="m-0">
                                    <img src="/{{ $item->logo->path }}" alt="{{ $item->name }}" width="150" class="me-3">
                                </figure>
                                <div>
                                    <table class="table table-sm table-borderless company-detail">
                                        <tr>
                                            <td colspan="2">
                                                <h2 class="h4">{{ $item->name }}</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Webpage:</th>
                                            <td>{{ $item->webpage }}</td>
                                        </tr>
                                        <tr>
                                            <th>City:</th>
                                            <td>{{ $item->city->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Franchising:</th>
                                            <td>{{ $item->franchising ? 'yes' : 'no' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </a>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
</x-client-layout>

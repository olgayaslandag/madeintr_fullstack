<x-client-layout>
    <div class="container">
        <h1 class="fw-bold my-5 text-center">{{ $tag->name }}</h1>

        <div>
            <ul class="list-unstyled companies">
                @foreach ($tag->companies as $item)
                    <li data-company='@json($item)'>
                        <a href="{{ route('company.get', $item->id) }}"
                            class="text-decoration-none text-dark"
                            data-bs-toggle="modal"
                            data-bs-target="#companyModal">
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
                                            <td>
                                                <a href="{{ $item->webpage }}" class="btn btn-gray btn-sm" target="_blank">
                                                    Visit Website <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>City:</th>
                                            <td>{{ $item->city->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Franchising:</th>
                                            <td>
                                                @if ($item->franchising)
                                                    Franchise Available <i class="fa-solid fa-check"></i>
                                                @else
                                                    No Franchise <i class="fa-solid fa-times"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sectors:</th>
                                            <td>
                                                @foreach ($item->tags as $tag)
                                                    <a href="{{ route('tag.get', $tag->id) }}" class="btn btn-default btn-sm">{{ $tag->name }}</a>
                                                @endforeach
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

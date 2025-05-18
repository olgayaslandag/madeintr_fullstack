<x-client-layout>
    <div class="container">
        <div class="text-center mb-5">
            <ul class="link-letters list-inline mb-0">
                <li class="list-inline-item">
                    <a href="" class="text-danger text-decoration-none fw-bold">
                        #
                    </a>
                </li>
                @foreach ($letters as $letter)
                <li class="list-inline-item">
                    <a href="" class="text-danger text-decoration-none fw-bold">
                        {{ $letter }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <ul class="list-unstyled">
            <li class="mb-4">
                <h3 class="fw-bold h4">#</h3>
                <ul class="list-inline link-letters border-0 p-0">
                @foreach ($companies as $company)
                    @if (ctype_digit(mb_substr($company->name, 0, 1)))
                        <li class="list-inline-item" data-company='@json($company)'>
                            <a href="{{ route('company.get', $company->id) }}"
                                class="text-danger text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#companyModal">{{ $company->name }}</a>
                        </li>
                    @endif
                @endforeach
            </li>
            </ul>
            @foreach ($letters as $letter)
            <li class="mb-4">
                <h3 class="fw-bold h4">{{ $letter }}</h3>
                <ul class="list-inline link-letters border-0 p-0">
                @foreach ($companies as $company)
                    @if (strtolower(mb_substr($company->name, 0, 1)) === $letter)
                        <li class="list-inline-item" data-company='@json($company)'>
                            <a href="{{ route('company.get', $company->id) }}"
                                data-bs-toggle="modal"
                                data-bs-target="#companyModal"
                                class="text-danger text-decoration-none">{{ $company->name }}</a>
                        </li>
                    @endif
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</x-client-layout>

<x-client-layout>
    <div class="container">
        <h1 class="fw-bold my-5 text-center">{{ $city->name }}</h1>

        <div>
            <ul class="list-unstyled companies">
                @foreach ($companies as $item)
                    <x-client-company-list :item="$item" />
                @endforeach
            </ul>
        </div>
    </div>
</x-client-layout>

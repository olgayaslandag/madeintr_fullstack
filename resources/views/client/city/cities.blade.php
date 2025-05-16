<x-client-layout>
    <div class="container">
        <div>
            <h1 class="h3 info-title text-center my-5 text-uppercase">Cities</h1>
        </div>
    </div>
    <div class="container">
        <ul class="list-unstyled three-columns">
            @foreach ($items as $item)
                <li>
                    <a href="{{ route('city.get', $item->id) }}" class="text-danger text-decoration-none">{{ $item->name }} ({{ $item->usage_count }})</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-client-layout>

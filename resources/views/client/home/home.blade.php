<x-client-layout>
    <div class="container">
        <div class="home-area text-center">
            <h1 class="fw-bold mb-0">Products & More</h1>
            <p>Discover the excellent products in Türkiye</p>
            <ul class="list-inline">
                @foreach ($tags->take(100) as $tag)
                <li class="list-inline-item">
                    <a href="{{ route('tag.get', $tag->id) }}">{{ $tag->name }} ({{ $tag->usage_count }})</a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="map my-5">
            @include('client.home.map')
        </div>
    </div>
</x-client-layout>

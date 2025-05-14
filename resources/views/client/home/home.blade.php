<x-client-layout>
    <div class="container">
        <div class="home-area text-center">
            <h1 class="fw-bold">Products & More</h1>
            <p>Discover the excellent products in Türkiye</p>
            <ul class="list-inline">
                @foreach ($tags->take(100) as $tag)
                <li class="list-inline-item">
                    <a href="">{{ $tag->name }} ({{ $tag->usage_count }})</a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="map my-5">
            @include('client.home.map')
        </div>
    </div>
</x-client-layout>

<x-client-layout>
    <div class="container">
        <div>
            <h1 class="h3 info-title text-center my-5 text-uppercase">Sectors</h1>
        </div>
    </div>
    <div class="container">
        <ul class="list-unstyled three-columns">
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('tag.get', $tag->id) }}"
                        class="text-danger text-decoration-none">{{ $tag->name }} ({{ $tag->usage_count }})</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-client-layout>

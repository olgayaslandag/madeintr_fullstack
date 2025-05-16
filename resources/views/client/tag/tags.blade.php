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
                    <a href="{{ route('tag.get', $tag->id) }}" class="text-danger text-decoration-none">{{ $tag->name }} ({{ $tag->usage_count }})</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container d-none">
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

    <div class="container d-none">
        <ul class="list-unstyled">
            <li class="mb-4">
                <h3 class="fw-bold h4">#</h3>
                <ul class="list-inline link-letters border-0 p-0">
                @foreach ($tags as $tag)
                    @if (ctype_digit(mb_substr($tag->name, 0, 1)))
                        <li class="list-inline-item">
                            <a href="{{ route('tag.get', $tag->id) }}" class="text-danger text-decoration-none">{{ $tag->name }}</a>
                        </li>
                    @endif
                @endforeach
            </li>
            </ul>
            @foreach ($letters as $letter)
            <li class="mb-4">
                <h3 class="fw-bold h4">{{ $letter }}</h3>
                <ul class="list-inline link-letters border-0 p-0">
                @foreach ($tags as $tag)
                    @if (strtolower(mb_substr($tag->name, 0, 1)) === $letter)
                        <li class="list-inline-item">
                            <a href="{{ route('tag.get', $tag->id) }}" class="text-danger text-decoration-none">{{ $tag->name }}</a>
                        </li>
                    @endif
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</x-client-layout>

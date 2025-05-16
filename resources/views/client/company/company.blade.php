<x-client-layout>
    <div class="company-logo text-center mb-4">
        <img src="/{{ $item->logo->path }}" alt="logo" class="h-auto" width="300">
    </div>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="h3 info-title text-dark">{{ $item->name }}</h1>
                <div class="mb-3">
                    <a href="{{ $item->webpage }}" class="btn-default" target="_blank">
                        Visit Website <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <a href="" class="btn-gray mb-3">
                    {{ $item->city->name }} <i class="fa-solid fa-arrow-right"></i>
                </a>
                <p class="">{{ $item->desc }}</p>
                <div class="prefooter">
                    <div class="text-center tags-area">
                        <ul class="list-inline">
                            @foreach ($item->tags as $tag)
                                <li class="list-inline-item">
                                    <a href="{{ route('tag.get', $tag->id) }}">
                                        {{ $tag->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>

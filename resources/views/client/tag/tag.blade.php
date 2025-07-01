<x-client-layout>
    <div class="container">
        <h3 class="info-title text-center my-5 text-uppercase">{{ $tag->name }}</h3>

        <div>
            <ul class="list-unstyled companies">
                @foreach ($tag->companies as $item)
                    <x-client-company-list :item="$item" />
                @endforeach
            </ul>
        </div>
    </div>
</x-client-layout>

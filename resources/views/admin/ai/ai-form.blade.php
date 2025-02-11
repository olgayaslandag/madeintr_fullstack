<x-admin-layout>
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3 text-center">
            <h1 class="h4 fw-bold">AI Ayarları</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{route('admin.ai.store')}}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="prompt" class="form-label">Prompt</label>
                            <textarea class="form-control" name="prompt" id="prompt" rows="5">{{  $settings->prompt }}</textarea>
                            @error('prompt')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" name="model" id="model">
                                <option value="gpt-4o" {{ $settings->model == 'gpt-4o' ? 'selected' : '' }}>GPT-4o</option>
                                <option value="gpt-4o-mini" {{ $settings->model == 'gpt-4o-mini' ? 'selected' : '' }}>GPT-4o Mini</option>
                            </select>
                            @error('model')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $settings->id }}">
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>
    <div class="mb-5"></div>
</x-admin-layout>

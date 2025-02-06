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
                            <textarea class="form-control" name="prompt" id="prompt" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" name="model" id="model">
                                <option value="gpt-4">GPT-4</option>
                                <option value="gpt-3.5-turbo">GPT-3.5 Turbo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" class="form-control" name="temperature" id="temperature" min="0" max="1" step="0.1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>
    <div class="mb-5"></div>
</x-admin-layout>

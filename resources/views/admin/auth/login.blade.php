<x-admin-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 offset-sm-4">
                <form method="post" class="login-form" action="{{route('loginPost')}}">
                    @csrf
                    <div class="mb-3">
                        <label>Eposta</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email">
                    </div>

                    <div class="mb-3">
                        <label>Şifre</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password">
                    </div>
                    <button class="btn btn-primary form-control">Giriş</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

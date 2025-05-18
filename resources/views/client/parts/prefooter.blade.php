<div class="prefooter">
    <div class="container">
        <div class="text-center info-area mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2">
                    <h3 class="info-title">Which businesses support us?</h3>
                    <p>The businesses that support the development and sustainability of this website, where we strive to discover the wonderful products and dynamic businesses produced in Türkiye. We are grateful to all of them...</p>

                    <a href="">Check Out Our Sponsors <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>


        <div class="text-center tags-area mt-5">
            <ul class="list-inline">
                @foreach ($tags->take(50) as $tag)
                <li class="list-inline-item">
                    <a href="">{{ $tag->name }} ({{ $tag->usage_count }})</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="register-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 offset-sm-2">
                    <h3 class="mb-0 fw-bold">Register For Newsletter</h3>
                    <p class="mb-0">Receive email updates about featured businesses</p>
                </div>
                <div class="col-12 col-sm-4">
                    <form class="subscribe-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <button class="btn btn-secondary">Subscribe <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

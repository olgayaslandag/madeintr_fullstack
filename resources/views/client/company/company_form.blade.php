<x-client-layout>
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bold text-theme">Başvuru Formu</h1>
            <p class="mb-0"> İşletme kaydı tamamen ücretsizdir ancak tüm kayıt başvuruları onaylanmaz.
                <span class="d-block fw-bold">Onay için;</span>
            </p>
            <ul class="list-unstyled">
                <li>
                    <p class="mb-0">1. İşletmenizin tamamen İngilizce olarak oluşturulmuş bir web sayfası olmalıdır.</p>
                    <p class="mb-0">2. Türkiye’de imalat yapan bir işletme olmanız gerekmektedir.</p>
                </li>
            </ul>
            <p>Destek ihtiyacınız olduğunda bizimle iletişime geçebilirsiniz, sizlere destek olmaktan memnuniyet duyarız.</p>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3">
                <form class="text-center">
                    <div class="mb-3">
                        <label>İşletmenizin İngilizce Web Adresini Yazınız<br>
                            (Türkçe Sayfalara Çıkan Web Adresleri Onaylanmaz)</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label> İşletmenizin Ünvanını (Adını) Yazınız</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label> İşletmenizin Merkezi Hangi Şehirde?</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label> Franchise Veriyor musunuz?</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>İletişim E-Postası (Zorunlu Değil)</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label> İşletmenizin Logosu Ekleyiniz (400x400 px)</label>
                                <input type="file" name="logo" class="d-none">
                                <div class="logo-input"></div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label> İşletmeniz Hakkında Bilgi Yazısı <br>(Kısa ve Sadece İngilizce Olmalı)</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        @include('admin.company.tag-input')
                    </div>
                    <button class="btn btn-danger fw-bold rounded-5">Kayıt Başvurusunu Tamamla</button>
                </form>
            </div>
        </div>
    </div>
</x-client-layout>



<style>

</style>

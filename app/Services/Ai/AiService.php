<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;

class AiService
{
    protected string $apiKey;
    protected string $apiUrl = 'https://api.openai.com/v1/chat/completions';

    public function __construct()
    {
        $this->apiKey = config('services.openai.api_key');
    }

    public function sendPrompt(string $webpage, string $prompt, string $model = 'gpt-4o-mini', float $temperature = 1)
    {
        $promptt = "kullanıcı sana url adresi paylaşacak sen de sitedeki tüm bilgileri anlaşılır bir ingilizce olarak
            1 - business_name: Web sitesindeki işletmenin adı
            2 - city_code: Bu işletmenin merkezi hangi şehirde olduğunun plaka kodunu yaz
            3 - franchise: Bu işletme franchise veriyor mu? (Evet ya da hayır cevabı ver)
            4 - about_summary: Bu işletmenin hakkımızda bölümünde yazanların özeti. Eğer hakkımızda bölümü yoksa genel olarak firmayı inceleyip anlaşılır bir ingilizceyle kısa bir hakkımızda yazısı oluştur.
            5 - sectors: İşletmenin faaliyet gösterdiği sektör ya da sektörler, ya da ürettiği ürünler hakkında sektörler oluştur. Sektör oluşturma biçimi ingilizce - türkçesi formatında olsun Eğer firma farklı sektörlerde faaliyet gösteriyorsa hepsiyle alakalı sektör isimleri oluştur. Sektör isimlerini en az 8 adet olsun. Yeterli gelmezse daha fazla yaz.


            json formatında iletmelisin. sectors için şu format gerekiyor:  sectors: [{tr: '', en: ''}]";


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type'  => 'application/json',
        ])
        ->post($this->apiUrl, [
            'model'       => $model,
            'messages'    => [
                ['role' => 'system', 'content' => $prompt],
                ['role' => 'user', 'content' => $webpage]
            ],
            'temperature' => $temperature,
            'max_tokens' => 2048
        ])->body();

        return json_decode($response);
    }
}

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

    public function sendPrompt(string $prompt, string $model = 'gpt-4', float $temperature = 0.7): string
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type'  => 'application/json',
        ])->post($this->apiUrl, [
            'model'       => $model,
            'messages'    => [['role' => 'user', 'content' => $prompt]],
            'temperature' => $temperature,
        ]);

        return $response->json('choices.0.message.content', 'Yanıt alınamadı.');
    }
}

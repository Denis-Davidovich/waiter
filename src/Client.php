<?php

class Client
{
    private string $key;

    public function req($message): void
    {
        $client = new \GuzzleHttp\Client();
        $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->key
            ],
            'body' => [
                "model" => "gpt-4",
                "messages" => []
            ]
        ]);
    }
}

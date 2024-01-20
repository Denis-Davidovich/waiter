<?php

class Client
{
    public function req($message)
    {
        $client = new \GuzzleHttp\Client();
        $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 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'
            ],
            'body' => [
                "model" => "gpt-4",
                "messages" => []
            ]
        ]);
    }
}

<?php

namespace App\Interfaces\Http;

class Router
{
    public function handle(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($uri === '/health' && $method === 'GET') {
            echo json_encode(['status' => 'ok']);
            return;
        }

        http_response_code(404);
        echo json_encode(['error' => 'Not found']);
    }
}

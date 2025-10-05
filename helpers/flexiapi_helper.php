<?php

/**
 * FlexiAPI Helper for AbSiDee
 * Provides reusable helper functions for interacting with the FlexiAPI backend.
 */
function flexiapi_request(string $method, array $params = []): array
{
    $config = require __DIR__ . '/../config/config.php';
    $baseUrl = "http://{$config['db']['host']}/AbSiDee/public/api.php";
    $method = strtoupper($method);

    if ($method === 'GET') {
        $url = $baseUrl . '?' . http_build_query($params);
        $body = null;
    } else {
        $url = $baseUrl;
        $body = json_encode($params);
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            "X-FlexiAPI-Key: {$config['api']['key']}"
        ],
    ]);

    if ($body !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        $output = ['status' => false, 'message' => "cURL Error: $error", 'data' => null];
    } else {
        $output = json_decode($response, true) ?? ['status' => false, 'message' => 'Invalid JSON', 'data' => null];
    }

    // Inject JavaScript console log for debugging
    echo "<script>console.log('FlexiAPI {$method} Response:', " . json_encode($output) . ");</script>";

    return $output;
}

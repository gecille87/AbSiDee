<?php
function renderPage(string $title, string $content): void
{
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$title}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            {$content}
        </div>
    </body>
    </html>
    HTML;
}

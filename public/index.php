<?php
require __DIR__ . '/../helpers/auth.php';
require __DIR__ . '/layout.php';

requireLogin();
$user = $_SESSION['user'];

echo "<script>console.log('User session:', " . json_encode($user) . ");</script>";

$content = "
<h1 class='text-2xl font-bold mb-4'>Welcome, {$user['username']}!</h1>
<p class='text-gray-600 mb-6'>You are logged in as <b>{$user['email']}</b>.</p>
<a href='logout.php' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600'>Logout</a>
";
renderPage('Dashboard', $content);

<?php
require __DIR__ . '/../helpers/auth.php';
require __DIR__ . '/layout.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (loginUser($_POST['email'], $_POST['password'])) {
        echo "<script>console.log('✅ Login successful! Redirecting...');</script>";
        header('Location: index.php');
        exit;
    } else {
        $error = '❌ Invalid credentials.';
        echo "<script>console.error('Login failed - invalid credentials');</script>";
    }
}

$content = <<<HTML
<h1 class="text-2xl font-bold mb-4">Sign In</h1>
<form method="POST" class="space-y-4">
    <input type="email" name="email" placeholder="Email" required class="w-full border px-3 py-2 rounded">
    <input type="password" name="password" placeholder="Password" required class="w-full border px-3 py-2 rounded">
    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Sign In</button>
</form>
<p class="text-sm mt-4 text-gray-600">
    Don’t have an account?
    <a href="signup.php" class="text-blue-500 hover:underline">Sign Up</a>
</p>
<p class="text-red-500 mt-2">{$error}</p>
HTML;

renderPage('Sign In', $content);

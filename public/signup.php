<?php
require __DIR__ . '/../helpers/auth.php';
require __DIR__ . '/layout.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (registerUser($_POST['username'], $_POST['email'], $_POST['password'])) {
        echo "<script>console.log('✅ Signup successful! Redirecting...');</script>";
        header('Location: signin.php');
        exit;
    } else {
        $error = '❌ Registration failed. Try again.';
    }
}

$content = <<<HTML
<h1 class="text-2xl font-bold mb-4">Sign Up</h1>
<form method="POST" class="space-y-4">
    <input name="username" placeholder="Username" required class="w-full border px-3 py-2 rounded">
    <input type="email" name="email" placeholder="Email" required class="w-full border px-3 py-2 rounded">
    <input type="password" name="password" placeholder="Password" required class="w-full border px-3 py-2 rounded">
    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Sign Up</button>
</form>
<p class="text-sm mt-4 text-gray-600">
    Already have an account?
    <a href="signin.php" class="text-blue-500 hover:underline">Sign In</a>
</p>
<p class="text-red-500 mt-2">{$error}</p>
HTML;

renderPage('Sign Up', $content);

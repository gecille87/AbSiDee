<?php
require_once __DIR__ . '/flexiapi_helper.php';
session_start();

function registerUser(string $username, string $email, string $password): bool
{
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    $res = flexiapi_request('POST', [
        'action' => 'create',
        'table'  => 'users',
        'data'   => [[
            'username' => $username,
            'email'    => $email,
            'password' => $hashed
        ]]
    ]);
    return $res['status'] ?? false;
}

function loginUser(string $email, string $password): bool
{
    $res = flexiapi_request('GET', [
        'action'   => 'get',
        'table'    => 'users',
        'columns'  => 'id,username,email,password',
        'condition' => json_encode([[
            'field' => 'email',
            'operator' => '=',
            'value' => $email
        ]])
    ]);

    if (!empty($res['data'])) {
        $user = $res['data'][0];
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
    }
    return false;
}

function requireLogin(): void
{
    if (empty($_SESSION['user'])) {
        header('Location: signin.php');
        exit;
    }
}

function logoutUser(): void
{
    session_destroy();
    header('Location: signin.php');
    exit;
}

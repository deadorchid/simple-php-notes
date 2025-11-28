<?php

use Core\Validator;
use Core\App;
use Core\Session;

$errors = [];

$db = App::resolve('Core\Database');

if (!Validator::string($_POST['email'], 1, 512)) {
    $errors['email'] = 'Email is required and must be under 512 characters';
}

if (!Validator::string($_POST['password'], 1, 100)) {
    $errors['password'] = 'password is required and must me under 100 characters';
}

if (!empty($errors)) {
    return view('views/sessions/login.view.php', [
      'heading' => 'Log in',
      'errors' => $errors
    ]);
}

$user = $db->query(
    'select * from users where email=:email',
    ['email' => $_POST['email']]
)->find();

if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user'] = [
      'email' => $_POST['email']
    ];

    session_regenerate_id(true);
    header('Location: /notes');
    exit();
}

$errors['email'] = 'Incorrect email or password';

Session::flash('errors', $errors);

header('Location: /login');
exit();

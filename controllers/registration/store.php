<?php

use Core\Validator;
use Core\App;

$errors = [];

$db = App::resolve('Core\Database');

if (!Validator::string($_POST['email'], 1, 512)) {
    $errors['email'] = 'Email is required and must be under 512 characters';
}

if (!Validator::string($_POST['password'], 1, 100)) {
    $errors['password'] = 'password is required and must me under 100 characters';
}

if (!empty($errors)) {
    return view('views/registration/create.view.php', [
      'heading' => 'Register',
      'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email=:email', ['email' => $_POST['email']])->find();

if ($user) {
    header('Location: /login');
    exit();
}

$db->query('insert into users(email, password) values(:email, :password)', [
  'email' => $_POST['email'],
  'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
]);

$_SESSION['user'] = [
  'email' => $_POST['email']
];

header('Location: /');
exit();

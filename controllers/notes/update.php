<?php

use Core\Validator;
use Core\App;

$db = App::resolve('Core\Database');

$currentUserId = 2;

$note = $db->query(
    "select * from notes where id=:id",
    ['id' => $_POST['note_id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);


$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

if (count($errors)) {
    return view('views/notes/edit.view.php', [
      'heading' => 'Edit note',
      'errors' => $errors,
      'note' => $note
    ]);
}

$db->query(
    'update notes set body=:body where id=:id',
    ['body' => $_POST['body'],
    'id' => $_POST['note_id']]
);

header("Location: /note?id={$_POST['note_id']}");
die();

<?php

use Core\App;

$db = App::resolve('Core\Database');

$currentUserId = 2;

$note = $db->query("select * from notes where id=:id", ["id" => $_POST['id']])->findOrFail();

authorize($note["user_id"] === $currentUserId);
$db->query("DELETE FROM notes WHERE id=:id", ["id" => $_POST['id']]);

header('Location: /notes');
exit();

<?php

use Core\App;

$db = App::resolve('Core\Database');

$currentUserId = 2;

$note = $db->query("select * from notes where id=:id", ["id" => $_GET['id']])->findOrFail();

authorize($note["user_id"] === $currentUserId);

return view("views/notes/show.view.php", [
  'heading' => 'Note',
  'note' => $note
]);

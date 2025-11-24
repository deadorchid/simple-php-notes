<?php

use Core\App;

$db = App::resolve('Core\Database');

$notes = $db->query("select * from notes where user_id = 2")->findAll();

return view("views/notes/index.view.php", [
  'heading' => 'Notes',
  'notes' => $notes
]);

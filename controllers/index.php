<?php

$_SESSION['name'] = 'Daniil';

return view("views/index.view.php", [
  'heading' => "Home"
]);

<?php

use Core\Session;

return view(
    'views/sessions/login.view.php',
    ['heading' => 'Log in', 'errors' => Session::get('errors')]
);

<?php

$users = [
    'admin' => ['password' => password_hash('admin1', PASSWORD_DEFAULT), 'role' => 'admin'],
    'easy' => ['password' => password_hash('1', PASSWORD_DEFAULT), 'role' => 'admin'],
];
?>
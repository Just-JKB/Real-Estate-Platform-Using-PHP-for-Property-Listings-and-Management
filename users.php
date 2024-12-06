<?php

$users = [
    'admin' => ['password' => password_hash('admin1', PASSWORD_DEFAULT), 'role' => 'admin'],
    'user' => ['password' => password_hash('user', PASSWORD_DEFAULT),'role' => 'user'],
    'user1' => ['password' => password_hash('user1', PASSWORD_DEFAULT),'role' => 'user']
];
?>
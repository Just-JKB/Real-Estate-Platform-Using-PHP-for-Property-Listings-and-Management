<?php

$users = [
    'admin' => [
        'password' => password_hash('admin123', PASSWORD_DEFAULT), 
        'role' => 'admin'
    ],
    'user1' => [
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'role' => 'user'
    ],
    'user2' => [
        'password' => password_hash('user456', PASSWORD_DEFAULT),
        'role' => 'user'
    ]
];
?>
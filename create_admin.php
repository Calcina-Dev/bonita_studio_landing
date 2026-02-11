<?php

use App\Models\User;

$user = User::firstOrCreate(
['email' => 'admin@bonitastudio.com'],
[
    'name' => 'Admin',
    'password' => bcrypt('password'),
    'email_verified_at' => now(),
]
);

echo "User created: " . $user->email;
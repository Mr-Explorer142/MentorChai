<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$firstNames = ['Rakib', 'Sakib', 'Mahbub', 'Tariq', 'Shafiq', 'Rafiq', 'Asif', 'Hasan', 'Mehdi', 'Naim', 'Farhan', 'Tanvir', 'Tushar', 'Ariful', 'Saiful', 'Aminul', 'Mominul', 'Sabbir', 'Tamim', 'Mushfiq', 'Sadia', 'Nusrat', 'Faria', 'Sumaiya', 'Nabila', 'Tasnim', 'Jannatul', 'Afrin', 'Sanjida', 'Israt', 'Mahfuza', 'Ritu', 'Meem', 'Farhana', 'Tanjila'];
$lastNames = ['Hasan', 'Rahman', 'Islam', 'Ahmed', 'Hossain', 'Ali', 'Uddin', 'Khan', 'Chowdhury', 'Sarkar', 'Miah', 'Sikder', 'Talukder', 'Mahmud', 'Haque'];

$mentors = \App\Models\User::where('role', 'mentor')->get();
$count = 0;

foreach($mentors as $mentor) {
    $firstName = $firstNames[array_rand($firstNames)];
    $lastName = $lastNames[array_rand($lastNames)];
    $mentor->name = $firstName . ' ' . $lastName;
    $mentor->save();
    $count++;
}

echo "Updated {$count} mentors with Bangladeshi names.\n";

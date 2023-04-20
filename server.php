<?php

$taskList = [
    [
        'task' => 'Fare colazione',
        'done' => 'false'
    ],
    [
        'task' => 'Lavarsi i denti',
        'done' => 'false'
    ],
    [
        'task' => 'Accendere il pc',
        'done' => 'false'
    ],
    [
        'task' => 'Fare Lezione',
        'done' => 'false'
    ],
    [
        'task' => 'Pranzare',
        'done' => 'false'
    ],
    [
        'task' => 'Fare esercizio',
        'done' => 'false'
    ]
]; 

header('Content-Type: application/json');
echo json_encode($taskList);
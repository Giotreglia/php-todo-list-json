<?php

$taskList = [
    [
        'task' => 'Fare colazione',
        'done' => false
    ],
    [
        'task' => 'Lavarsi i denti',
        'done' => false
    ],
    [
        'task' => 'Accendere il pc',
        'done' => true
    ],
    [
        'task' => 'Fare Lezione',
        'done' => false
    ],
    [
        'task' => 'Pranzare',
        'done' => false
    ],
    [
        'task' => 'Fare esercizio',
        'done' => false
    ]
]; 

if (isset($_POST['task'])) {

    $newTask = $_POST['task'];
    $taskList[] = 
        [
            'task' => $newTask,
            'done' => false
        ];
};  

header('Content-Type: application/json');
echo json_encode($taskList);
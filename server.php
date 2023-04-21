<?php

if (file_exists('database.json')) {
    $string = file_get_contents('database.json');
    $taskList = json_decode($string, true);
} else {
    $taskList = []; 
}

if (isset($_POST['task'])) {

    $newTask = $_POST['task'];
    $taskList[] = 
        [
            'task' => $newTask,
            'done' => false
        ];
    $myString = json_encode($taskList);
    file_put_contents('database.json', $myString);
};  

header('Content-Type: application/json');
echo json_encode($taskList);
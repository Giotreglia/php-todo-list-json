<?php

// Programma per scrivere su file .json

// Se già esistente otteniamo il contenuto del file .json, lo trasformiamo in 
// linguaggio PHP e lo assegniamo all'array della lista delle task.
// Se invece non è ancora esistente il file dichiariamo che la lista delle task è un array.


if (file_exists('database.json')) {
    $string = file_get_contents('database.json');
    $taskList = json_decode($string, true);
} else {
    $taskList = []; 
}

// All'inserimento di una task pushamo la nuova task nell'array delle task, 
// trasformiamo i dati della tasklist in una stringa e andiamo a scriverli e salvarli
// nel file database che viene sovrascritto o creato se non esistente.
// Dopodiché ritrasmettiano l'array delle task aggiornato al front.


// AGGIUNGI NUOVA TASK
if (isset($_POST['task'])) {

    $newTask = $_POST['task'];
    $taskList[] =   [
                        'task' => $newTask,
                        'done' => false
                    ];
    
    $myString = json_encode($taskList);
    file_put_contents('database.json', $myString);

// CAMBIA STATO TASK    
} else if (isset($_POST['setTaskDone'])) {

    $index = $_POST['setTaskDone'];

    $taskList[$index]['done'] = !$taskList[$index]['done'];

    $myString = json_encode($taskList);
    file_put_contents('database.json', $myString);

// ELIMINA TASK    
} else if (isset($_POST['removeTask'])) {

    $index = $_POST['removeTask'];

    array_splice($taskList, $index, 1);

    $myString = json_encode($taskList);
    file_put_contents('database.json', $myString);

}

header('Content-Type: application/json');
echo json_encode($taskList);
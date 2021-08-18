<?php 

session_start();


$conn = new mysqli(
    'localhost',
    'root',
    'root',
    'taskList'
);

if ($conn->connect_error) {
    die("Error: ".$conn->connect_error);
}


?>
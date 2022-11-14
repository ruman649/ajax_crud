<?php

include_once 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];

$up = "update try set name='{$name}', age='{$age}' where id='{$id}' ";
$q = mysqli_query($connect, $up);

if($q){
    echo 1;
}
else{
    echo 0;
}
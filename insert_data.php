<?php
include_once 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];

$insert = "insert into try (name, age)values('{$name}', '{$age}') ";
$q = mysqli_query($connect, $insert);

if($q){
    echo 1;
}
else{
    echo 2;
}
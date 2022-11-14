<?php

include_once "config.php";

$id = $_POST['id'];

$d = "delete from try where id={$id}";
if(mysqli_query($connect, $d)){
    echo 1;
}
else{
    echo 0;
}
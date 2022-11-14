<?php

include_once "config.php";

$id = $_POST['id'];

$s = "select * from try where id={$id}";
$sq = mysqli_query($connect, $s);

$result = "";
if (mysqli_num_rows($sq) > 0) {
    $row = mysqli_fetch_assoc($sq);
    $result .= "
        <input type='hidden' value='{$row["id"]}' id='eid'><br><br>
        <span>Name</span><input type='text' value='{$row["name"]}'  id='ename'><br><br>
        <span>Age</span><input type='text' id='eage' value='{$row["age"]}'><br><br>
        <button class='esubmit' id='esubmit'>Insert Data</button>
    ";
    echo $result;
} else {
    echo "id is not matched";
}

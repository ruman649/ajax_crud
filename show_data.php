<?php

include_once 'config.php';

$s = "select * from try ";
$sq = mysqli_query($connect, $s);


$result = "";
if (mysqli_num_rows($sq) > 0) {
    while ($row = mysqli_fetch_assoc($sq)) {
        $result .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td><button data-eid='{$row['id']}' id='edit_btn'>Edit</button></td>
                <td><button data-delete_id='{$row['id']}' id='delete_id'>Delete</button></td>
            </tr>
        ";
    }
    echo $result;
}
else{
    echo "data not found";
}



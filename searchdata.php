<?php

require_once 'connection.php';
if(isset($_POST["search"])){
    $val = $_POST["search"];

    $sql = "SELECT * FROM airports WHERE Airport LIKE '%$val%'";
    $res = mysqli_query($connection, $sql);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
    }

    $incode = json_encode($data);
    print_r($incode);

}

?>
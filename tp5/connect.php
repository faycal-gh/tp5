<?php
function connect(){
    $db = mysqli_connect('localhost', 'root', '', 'tp5');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        return $db;
    }
}
?>
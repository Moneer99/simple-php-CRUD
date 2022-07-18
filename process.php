<?php

include 'db_conn.php';

if (isset($_POST['save'])) {
    // print_r ($_POST);
    $name = $_POST['name'];
    $location = $_POST['location'];

    if ($name !== '' && $location !== '') {
        // insert to database
        $mysqli->query("INSERT INTO data (name,location) VALUES ('$name', '$location')")or die($mysqli->error);
        header('location:index.php');
    }else{

        header('location:index.php');
    }
}
?>
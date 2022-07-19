<?php

session_start();

include 'db_conn.php';

if (isset($_POST['save'])) {
    // print_r ($_POST);
    $name = $_POST['name'];
    $location = $_POST['location'];

    if ($name !== '' && $location !== '') {
        // insert to database
        $mysqli->query("INSERT INTO data (name,location) VALUES ('$name', '$location')")or die($mysqli->error);

        $_SESSION['message'] = 'Record has been saved!';
        $_SESSION['msg_type'] = 'success';

        header('location:index.php');
    }else{

        header('location:index.php');
    }
}

if(isset($_GET['delete'])){
    // print_r($_GET);
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id = $id")or die($mysqli->error);

    $_SESSION['message'] = 'Record has been deleted';
    $_SESSION['msg_type'] = 'danger';

    header('location:index.php');
}
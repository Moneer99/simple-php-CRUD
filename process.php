<?php

include 'db_conn.php';

session_start();

$name= '';
$location = '';
$update = false;

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

if(isset($_GET['edit'])){

    $id = $_GET['edit'];
    // Get data from database depending on id
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);

    if ($result){
        $update = true;
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];

    }
}

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $locaction = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name',location='$locaction'WHERE id='$id'")or
    die($mysqli->error);

    $_SESSION['message'] = 'Record has been successfully updat';
    $_SESSION['msg_type'] = 'warning';

    header('location:index.php');
}
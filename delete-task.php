<?php
if (isset($_SESSION['role']) &&  isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    include "DB_connection.php";
    include "app/Model/Task.php";

    if (!isset($_GET['id'])) {
        header("Location: tasks.php");
        exit();
    }

    $id = $_GET['id'];
    $tasks = get_task_by_id($conn, $id);

    if ($tasks == 0) {
        header("Location: tasks.php");
        exit();
    }

    $data = array('id');
    delete_task($conn, $data);
    $sm = "Deleted Successfully";
    header("Location: tasks.php?success=$sm");
    exit();

}else{

    $em = "First Login";
    header("Location: login.php?error=$em");
    exit();
    }

    ?>

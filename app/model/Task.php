<?php


function insert_task($conn, $data)
{

    $sql = "INSERT INTO tasks (title, description, assigned_to, due_to) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function get_all_tasks($conn)
{

    $sql = "SELECT * FROM tasks ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $tasks = $stmt->fetchAll();
    } else $tasks = 0;

    return $tasks;
}

function get_all_tasks_due_today($conn)
{

    $sql = "SELECT * FROM tasks WHERE due_date = CURDATE() AND status != 'complated' ORDER BY id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $tasks = $stmt->fetchALL();
    } else $tasks = 0;

    return $tasks;
}

function count_tasks_due_today($conn)
{
    $sql = "SELECT id FROM tasks WHERE due_date = CURDATE() AND status != 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function get_all_tasks_overdue($conn)
{

    $sql = "SELECT * FROM tasks WHERE due_date < CURDATE() AND status != 'completed' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount > 0) {
        $tasks = $stmt->fetchAll();
    } else $tasks = 0;
    return $tasks;
}

function count_tasks_overdue($conn)
{
    $sql = "SELECT id FROM tasks WHERE due_date < CURDATE() AND status != 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

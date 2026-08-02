<?php 
session_start();

if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "employee") {

    include "DB_connection.php";
    include "app/Model/Task.php";
    include "app/Model/USer.php";

    if (!isset($_GET["id"])) {
        header("Location: task.php");
        exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);

    if ($task == 0) {
        header("location: task.php");
        exit();
    }

    $users = get_all_users($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Task</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
 <input type="checkbox" id="checkbox">
<?php include "inc/header.php" ?>
<body class="body">
 <?php include "inc/nav.php" ?>
<section class="section-1">
<h4 class="title">Edit Task <a href="task.php">Tasks</a></h4>


</section>

</body>
<script type="text/javascript">
	var active = document.querySelector("#navList li:nth-child(4)");
	active.classList.add("active");
</script>
</body>

</html>

<?php }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>
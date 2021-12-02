<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'hamza', 'dbProject');

	// initialize variables
	$role_name = "";
	$status = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$role_name = $_POST['role_name'];
		$status = $_POST['status'];

		mysqli_query($db, "INSERT INTO role (role_name, status) VALUES ('$role_name', '$status')"); 
		$_SESSION['message'] = "Role Saved"; 
		header('location: role.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $role_name = $_POST['role_name'];
        $status = $_POST['status'];
    
        mysqli_query($db, "UPDATE role SET role_name='$role_name', status='$status' WHERE id=$id");
        $_SESSION['message'] = "Role updated!"; 
        header('location: role.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM role WHERE id=$id");
        $_SESSION['message'] = "Role deleted!"; 
        header('location: role.php');
    }
    
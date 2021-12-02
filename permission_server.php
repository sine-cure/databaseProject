<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'hamza', 'dbProject');

	// initialize variables
	$role_id = 0;
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$role_id = $_POST['role_id'];

		mysqli_query($db, "INSERT INTO permission (role_id) VALUES ('$role_id')"); 
		$_SESSION['message'] = "Permission Saved"; 
		header('location: permission.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $role_id = $_POST['role_id'];
    
        mysqli_query($db, "UPDATE permission SET role_id='$role_id' WHERE id=$id");
        $_SESSION['message'] = "Permission updated!"; 
        header('location: permission.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM permission WHERE id=$id");
        $_SESSION['message'] = "Permission deleted!"; 
        header('location: rolePermission.php');
    }
    
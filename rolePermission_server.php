<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'hamza', 'dbProject');

	// initialize variables
	$role_id = 0;
	$permission_id = 0;
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$role_id = $_POST['role_id'];
		$status = $_POST['permission_id'];

		mysqli_query($db, "INSERT INTO role_permission (role_id, permission_id) VALUES ('$role_id', '$permission_id')"); 
		$_SESSION['message'] = "Role Permission Saved"; 
		header('location: rolePermission.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $role_id = $_POST['role_id'];
        $status = $_POST['permission_id'];
    
        mysqli_query($db, "UPDATE role_permission SET role_id='$role_id', permission_id='$permission_id' WHERE id=$id");
        $_SESSION['message'] = "Role Permission updated!"; 
        header('location: rolePermission.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM role_permission WHERE id=$id");
        $_SESSION['message'] = "Role Permission deleted!"; 
        header('location: rolePermission.php');
    }
    
<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'hamza', 'dbProject');

	// initialize variables
	$first_name = "";
	$last_name = "";
    $role_id = 0;
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
        $role_id = $_POST['role_id'];

		mysqli_query($db, "INSERT INTO users (first_name, last_name, role_id) VALUES ('$first_name', '$last_name', '$role_id')"); 
		$_SESSION['message'] = "User Saved"; 
		header('location: user.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $role_id = $_POST['role_id'];
    
        mysqli_query($db, "UPDATE users SET first_name='$first_name', last_name='$last_name' WHERE id=$id");
        $_SESSION['message'] = "User updated!"; 
        header('location: user.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE id=$id");
        $_SESSION['message'] = "User deleted!"; 
        header('location: user.php');
    }
    
<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'hamza', 'dbProject');

	// initialize variables
	$user_id = 0 ;
    $file_name = "";
    $file_url = "";
    $phone_number = "";
    $device_name = "";
    $app_version = "";
    $device_type = "";
    $status = "";
    $date = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
        $user_id = $_POST['user_id'];
        $file_name = $_POST['file_name'];
        $file_url = $_POST['file_url'];
        $phone_number = $_POST['phone_number'];
        $device_name = $_POST['device_name'];
        $app_version = $_POST['app_version'];
        $device_type = $_POST['device_type'];
        $status = $_POST['status'];
        $date = $_POST['date'];

        echo($user_id);
        echo($file_name);
        echo($file_url);

        mysqli_query($db, "INSERT INTO file ( user_id, file_name, file_url, phone_number, device_name, app_version, device_type, status, date) 
                    VALUES ('$user_id', '$file_name', '$file_url', '$phone_number', '$device_name', '$app_version', '$device_type', '$status', '$date')"); 
		
		$_SESSION['message'] = "File Saved"; 
		header('location: file.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $file_name = $_POST['file_name'];
        $file_url = $_POST['file_url'];
        $phone_number = $_POST['phone_number'];
        $device_name = $_POST['device_name'];
        $app_version = $_POST['app_version'];
        $device_type = $_POST['device_type'];
        $status = $_POST['status'];
        $date = $_POST['date'];

    
        mysqli_query($db, "UPDATE file SET user_id='$user_id', file_name='$file_name', file_url='$file_url', phone_number='$phone_number', device_name='$device_name', app_version='$app_version', device_type='$device_type', status='$status', date='$date' WHERE id=$id");
        $_SESSION['message'] = "File updated!"; 
        header('location: file.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM file WHERE id=$id");
        $_SESSION['message'] = "File deleted!"; 
        header('location: file.php');
    }
    
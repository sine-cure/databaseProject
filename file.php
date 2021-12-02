<?php  include('file_server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM file WHERE id=$id");

		if ($record ) {
			$n = mysqli_fetch_array($record);
			$user_id = $n['user_id'];
            $file_name = $n['file_name'];
            $file_url = $n['file_url'];
            $phone_number = $n['phone_number'];
            $device_name = $n['device_name'];
            $app_version = $n['app_version'];
            $device_type = $n['device_type'];
            $status = $n['status'];
			$date = $n['date'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Database Project | File</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<br>
<br>
<br>

<?php $results = mysqli_query($db, "SELECT * FROM file"); ?>

<table>
	<thead>
		<tr>
			<th>User ID</th>
            <th>File Name</th>
            <th>File URL</th>
            <th>Phone Number</th>
            <th>Device Name</th>
            <th>Device Type</th>
            <th>App Version</th>
			<th>Status</th>
            <th>Date</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['file_name']; ?></td>
            <td><?php echo $row['file_url']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['device_name']; ?></td>
            <td><?php echo $row['device_type']; ?></td>
            <td><?php echo $row['app_version']; ?></td>
            <td><?php echo $row['status']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
				<a href="file.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="file_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="file_server.php" >
    <?php if ($update == true): ?>
               <h2>Update File</h2>
            <?php else: ?>
                <h2>Add File</h2>
            <?php endif ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>User ID</label>
			<input type="number" name="user_id" value="<?php echo $user_id; ?>">
		</div>
        <div class="input-group">
			<label>File Name</label>
			<input type="text" name="file_name" value="<?php echo $file_name; ?>">
		</div>
        <div class="input-group">
			<label>File URL</label>
			<input type="text" name="file_url" value="<?php echo $file_url; ?>">
		</div>
        <div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
		</div>
        <div class="input-group">
			<label>Device Name</label>
			<input type="text" name="device_name" value="<?php echo $device_name; ?>">
		</div>
        <div class="input-group">
			<label>Device Type</label>
			<input type="text" name="device_type" value="<?php echo $device_type; ?>">
		</div>
        <div class="input-group">
			<label>App Version</label>
			<input type="text" name="app_version" value="<?php echo $app_version; ?>">
		</div>
		<div class="input-group">
			<label>Status</label>
			<input type="text" name="status" value="<?php echo $status; ?>">
		</div>
        <div class="input-group">
			<label>Date</label>
			<input type="text" name="date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
                <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>
		</div>
	</form>
</body>
</html>
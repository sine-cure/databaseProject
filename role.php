<?php  include('role_server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM role WHERE id=$id");

		if ($record ) {
			$n = mysqli_fetch_array($record);
			$role_name = $n['role_name'];
			$status = $n['status'];
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Database Project | Role</title>
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

<?php $results = mysqli_query($db, "SELECT * FROM role"); ?>

<table>
	<thead>
		<tr>
			<th>Role</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['role_name']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td>
				<a href="role.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="role_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="role_server.php" >
    <?php if ($update == true): ?>
               <h2>Update Role</h2>
            <?php else: ?>
                <h2>Add Role</h2>
            <?php endif ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Role</label>
			<input type="text" name="role_name" value="<?php echo $role_name; ?>">
		</div>
		<div class="input-group">
			<label>Status</label>
			<input type="text" name="status" value="<?php echo $status; ?>">
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
<?php  include('user_server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if ($record ) {
			$n = mysqli_fetch_array($record);
			$first_name = $n['first_name'];
			$last_name = $n['last_name'];
            $role_id = $n['role_id'];
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Database Project | User</title>
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

<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>

<table>
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
            <th>Role Id</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['role_id']; ?></td>
			<td>
				<a href="user.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="user_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="user_server.php" >
	<?php if ($update == true): ?>
               <h2>Update User</h2>
            <?php else: ?>
                <h2>Add User</h2>
            <?php endif ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="first_name" value="<?php echo $first_name; ?>">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last_name" value="<?php echo $last_name; ?>">
		</div>
        <div class="input-group">
			<label>Role Id</label>
			<input type="number" name="role_id" value="<?php echo $role_id; ?>">
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
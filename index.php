<?php
error_reporting(0);
include('class/class_form.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form image upload</title>
</head>

<?php
$folder_img = 'upload/profile/';

$image = $_FILES['profile']['name'];

$img_path = $folder_img.$image;

move_uploaded_file($_FILES['profile']['tmp_name'], $img_path);

if(isset($_POST['student_data']))
{
	$response = $objLogin->form_add($_POST,$img_path);
	//echo $response;

		if($response ==1)
		{
			echo"<script>alert('Inserted')</script>";
		}
		else{
		mysql_error(); 
		echo "<script>alert('try')</script>";
			}

}
?>
<body>
	<form method="post" name="user_form" enctype="multipart/form-data">
<label>Name</label> <input type="text" placeholder="Enter full name" name="fname" required>
<label>Phone number</label> <input type="text" name="phone" required>
<label>password</label><input type="password" placeholder="Enter password" name="pass" required>
<label>email ID</label> <input type="email" placeholder="Enter email address" name="email" required>
<label>Image upload</label><input type="file" name="profile">

<input type="submit" name="student_data" value="Submit">
	</form>


	<div>
		<table>
			<thead>
				<th>Name</th>
				<th>phone Number</th>
				<th>Password</th>
				<th>Email</th>
				<th>Image</th>
			</thead>
			<tbody>
				<?php 

					$sql = $dbo->prepare("select * from users order by uid asc");
					$sql->execute();
					while ($rec = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

						<tr>
							<td><?php echo $rec['name'];?></td>
							<td><?php echo $rec['phone']; ?></td>
							<td><?php echo $rec['password'];?></td>
							<td><?php echo $rec['email']; ?></td>
							<td><img height="50" width="50" src=<?php echo $rec['image'];?>></td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>
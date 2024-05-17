<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Update Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
	<!-- Start Navbar -->
	<div class="container">
		<?php
		include("oop.php");
		$db = new Blog();
		$status=false;
		$db->_get();
		if (isset($_POST['id'])) {
			$status=true;
			$id = $_POST['id'];
			$data = $db->select("*", "posts", "id='$id'");
			$row = $data->fetch(PDO::FETCH_ASSOC);
		}
		if (isset($_POST['submit'])) {
			$error = [];
			if (isset($_POST['title']) && empty($_POST['title'])) {
				$error['error1'] = "enter the title";
			} else {
				$title = $_POST['title'];
			}
			if (isset($_POST['content']) && empty($_POST['content'])) {
				$error['error2'] = "enter the description";
			} else {
				$content = $_POST['content'];
			}
			if (count($error) <= 0 ){
				$db->update("posts","title='$title',content='$content'", "id='$id'");
				header("location:posts.php");
			}
		
		}
		if($status){
		?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
			<h3 class="my-4">Update Post</h3>
			<hr class="my-4" />
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Post Title</label>
				<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" value="<?php echo $row['title'] ?>" placeholder="Enter Post Title">

					<p style="color: red;"><?php if (isset($error['title'])) echo $error['title'] ?></p>
				</div>
			</div>

			<hr class="bg-transparent border-0 py-1" />
			<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
				<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" placeholder="Enter Content"><?php echo $row['content'] ?></textarea>
					<p style="color: red;"><?php if (isset($error['content'])) echo $error['content'] ?></p>
				</div>
			</div>
			<hr class="my-4" />
			<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
				<div class="col-md-7"><button class="btn btn-primary btn-lg" name="submit" type="submit">Update</button></div>
			</div>
		</form>
	</div>
</body>
<?php }
else{
	echo "invalid request";
}
?>

</html>
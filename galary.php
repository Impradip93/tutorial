<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Galary </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		.err {
			color: red;
		}
	</style>
</head>

<body>
	<?php
	session_start();
	include "nav_code1.php";
	include_once('class/class.php');

	if (!isset($_SESSION['id'])) {
		header('location:login_form.php');
	}
	?>
	<script></script>

	<!-- <a href="photo.php" class="btn btn-primary my-2">Upload Photo</a> -->

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<?php
				$album = new album();
				// print_r($_SESSION); die;
				$conds['user_id'] = $_SESSION['id'];
				$albums = $album->get_albums($conds);

				while ($row = mysqli_fetch_assoc($albums)) {
				?>


				</h1>Welcome to Galary</h1>
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<svg class="bd-placeholder-img card-img-top album" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
								<title></title>
								<rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text><?php echo $row['album_title']; ?></text>
							</svg>
							<div class="card-body">
								<p class="card-text"><?php echo $row['al_message']; ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="photo.php?album_id=<?php echo $row['album_id']; ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
										<!-- view button -->
										<a href="delete.php?album_id=<?php echo $row['album_id']; ?>" type="button" class="btn btn-sm btn-outline-secondary">delete</a>
										<!-- delete button -->
									</div>
									<small class="text-muted"><?php echo $row['date']; ?></small>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>

			</div>
		</div>
	</div>


</body>

</html>
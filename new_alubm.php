<!doctype html>
<html>
	<head>
		<title>My Album</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<style>
		.album{text-anchor: middle;}
		</style>
	</head>
	<body>
	<?php

		session_start();
		if(empty($_SESSION)){
			header('location:login.php');
		}
	?>
		<div class="container">
        <?php include_once('nav_code1.php'); ?>
		<?php include_once('feed/insert_album.php'); ?>
		<div class="container">
      <h1>My Album</h1>
      
      <p>
        <a href="album.php" class="btn btn-primary my-2">Create Album</a>
      </p>
	  
	  
	  <div class="album py-5 bg-light">
	   <div class="row">
		<?php
		$album = new album();
		$conds['user_id']=$_SESSION['user_id'];
		$albums = $album->get_albums($cond);
		$result = mysqli_query($cond, $album);
		
		while($row = mysqli_fetch_assoc($result)){
		?>
		 


			<div class="col-md-4">
			  <div class="card mb-4 shadow-sm">
				<svg class="bd-placeholder-img card-img-top album" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $row['album_title']; ?></text></svg>
				<div class="card-body">
				  <p class="card-text"><?php echo $row['al_message']; ?></p>
				  <div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
					  <a href="photo.php?album_id=<?php echo $row['album_id']; ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
					  <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
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
		
			
			
			
			
			
			
		</div>
	</body>
</html>
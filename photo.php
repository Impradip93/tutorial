<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>photo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- include venbox css for image popup -->
    <link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="screen" />
    <style>
        .img {
            height: 300px !important;
            width: 2000px !important;
        }
    </style>
</head>

<body>

    <?php
    include_once('class/class.php');
    session_start();

    if (!isset($_SESSION['id'])) {
        header('location:login_form.php');
    }
    include 'nav_code1.php';

    $album = new album();
    // print_r($_SESSION); die;
    $conds['user_id'] = $_SESSION['id'];
    $albums = $album->get_albums($conds);

    $row = mysqli_fetch_assoc($albums);
    // print_r($row['album_id']); 

    ?>
    <script>
        // $("#firstlink").venobox().trigger('click');
        $(document).ready(function() {
            $('.venobox').venobox();
        });
        $("#firstlink").venobox().trigger('click');
    </script>


    <!-- <a href="upload_photo.php"> -->
    <div class="container">
        <a href="upload_photo.php?album_id=<?php echo $row['album_id']; ?>" type="button" class="btn btn-bg btn-outline-secondary">Upload photo</a>
        <!-- <input type="submit" class="btn btn-primary" name="sumbit" id="sumbit" value="Upload Photo" />
    </div> -->

        <h1><?php echo $row['album_title']; ?></h1>
        <!-- this is album title -->

        <?php
        if (isset($_GET['succ']) && $_GET['succ'] == 1) {   //this will execute after imeage upload successfully
        ?>
            <div class="alert alert-primary" role="alert">
                Image uploaded succesfully!
            </div>
        <?php } ?>
        

        <!-- Image uploader div start-->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    $album = new album();
                    // print_r($_SESSION); die;
                    $conds['album_id'] = $_GET['album_id'];
                    $result = $album->get_photo($conds);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {


                    ?>



                            <div class="col-md-4" onclick="return validate();">

                                <div class="card mb-4 shadow-sm">

                                    <!-- <a class="venobox" data-gall="uploads"></a> -->
                                    <a class="venobox" href="<?php echo $row['photo_path']; ?>">

                                        <!--venbox class for popup-->
                                        <img class="img-thumbnail img" width="550" src="<?php echo $row['photo_path']; ?>" />
                                        <!-- <svg class="bd-placeholder-img card-img-top album" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                            
								<title></title>
								<rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></text>
                            </svg> -->
                                        <!-- </a> -->
                                        <!-- above line include for image popup -->

                                        <div class="card-body">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">


                                                </div>
                                                <small class="text-muted"><?php echo $row['date']; ?></small>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            </a>

                    <?php }
                    }  ?>

                </div>
            </div>
        </div>
        <!-- Image uploader div end-->
        <!-- incude venbox.min.js for image popup -->
        <scrip type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></scrip>
        <scrip type="text/javascript" src="venobox/venobox.min.js"></scrip>
</body>

</html>
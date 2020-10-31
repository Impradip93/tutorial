<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'nav_code1.php';
    include 'class/class.php';
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload"></input>
            <label class="custom-file-label" for="fileToUpload">Choose Photo</label>
        </div>
        <input type="submit" value="Upload Image" name="submit"></input>

    </form>
    <?php
    if (!empty($_FILES)) {
    //   print_r($_FILES); die;
        $target_dir = "uploads/";
       // $file_name= $_FILES(["fileToUpload"]["name"]);
        $file_name= $_FILES["fileToUpload"]["name"];
       // echo $file_name; 
        $file_name=  uniqid().'_'.$file_name;
       // print_r($file_name) ;
        $target_file = $target_dir . $file_name;
       
        // $uploadOk = 1; echo "$uploadOk"; die;
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allow_type = array('jpg','jpeg','png');
        if (isset($_POST["submit"])) {
           if(in_array($imageFileType, $allow_type)){
            //    echo 'file is an image';
               if(move_uploaded_file($_FILES["fileToUpload"]['tmp_name'], $target_file)){
                    echo 'image uploaded';
                    $data = array (
                        'album_id'=> $_GET['album_id'],
                        'photo_path'=> $target_file,
                    );
                    $album = new album();
                    $album->upload_photo($data);
                    header('location:photo.php?album_id='.$_GET['album_id'].'&succ=1');
                }else{
               echo 'Something error';
           }
      }
      else{
          echo "File type is not image";
      }
  }
}
    ?>
    
</body>

</html>
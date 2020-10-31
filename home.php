<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include "nav_code1.php";
    include "conn.php";
    if (!isset($_SESSION['id'])) {
        header('location:login_form.php');
    }

    ?>

    <h1>this is home</h1>

    <?php
    echo 'welcome ' . $_SESSION['name'];
    ?>



    <?php
    if (isset($_GET['succ']) && $_GET['succ'] == 1) {
        echo "your message successfuly posted";
    }
    if (isset($_GET['succ']) && $_GET['succ'] == 3) {
        echo "your album successfully created";
    }
    ?>

    <form action="post.php" method="post">
        <div class="container">
            <class="form-group">
                <label for="exampleFormControlTextarea1"> Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Enter your text here" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button type="Post" class="btn btn-primary">Post</button>
        </div>
    </form>
    <?php
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `new_table` left JOIN `post_tbl` ON new_table.id=post_tbl.id WHERE `new_table`.`id`='$id' order by `post_tbl`.`post_id` Desc";
    $result = $conn->query($sql);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<main role='main' class='container'>
                <h1 class='mt-5'>" . ucfirst($row['name']) . "</h1>
                <p class='lead'>" . $row['message'] . "</p>
                <p class='lead'>" . $row['date'] . "</p>
            </main>";
        }
        ?>
        <?php
        $id = $_SESSION['id'];
        $album = "SELECT * FROM `new_table` LEFT JOIN `album_tbl` ON new_table.id=album_tbl.user_id WHERE `new_table`.`id`='$id' ORDER BY `album_tbl`.`album_id` DESC";
        $result1 = $conn->query($album);
        print_r($result1);
   ?>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/kK_2mzBARTU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



</body>

</html>
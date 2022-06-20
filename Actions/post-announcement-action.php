<?php
    include "dbconnection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/announcement.php ">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            $headline = mysqli_real_escape_string($conn, $_POST["title"]);
            $news_details = mysqli_real_escape_string($conn, $_POST["body"]);

            $sql0 = "INSERT INTO announcement (title, body, created)
            VALUES('$headline', '$news_details', NOW())"; ?>

            <?php
            if (($conn->query($sql0) === TRUE)) { 
               header("location: ../post-announcement.php?error=postsuccess");?>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Server Error !<br>";
                echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php
            }

            $conn->close();
            ?>
        </div>

        
    </div>

</body>
</html>

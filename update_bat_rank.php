<?php
session_start();
include 'config/conn.php';
include 'includes/header.php';

// Check if ID is provided for updating
// here you can get id through link and all the data 
if (isset($_GET['bat_update_id'])) {
    $Id_update = $_GET['bat_update_id'];
    $sql = "SELECT * FROM `batting_ranks` WHERE Id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($check_sql)) {
        $Ranks = $row['Ranks'];
        $batsman_photo = $row['batsman_photo'];
        $Batsman_name = $row['Batsman_name'];
        $rating = $row['rating'];
    }
}

// Handle form submission for updating data
if (isset($_POST['update_batsman_rank'])) {
    $id = $_POST['update_batsman_rank'];
    $Ranks = $_POST['Ranks'];
    $Batsman_name = $_POST['Batsman_name'];
    $rating = $_POST['rating'];

    // Check if a new image is uploaded
    if ($_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
        $new_image = $_FILES['new_image']['name'];      //new image
        $temp_name = $_FILES['new_image']['tmp_name'];  //temperary file
        $folder = "images/" . $new_image;  //folder where image store 

        // Move uploaded file to destination folder
        if (move_uploaded_file($temp_name, $folder)) {
            // Update image path in database
            $batsman_photo = $folder;
        } else {
            $_SESSION['error'] = "Failed to upload image";
            header("location: batsmanranking.php");
            exit();
        }
    }

    // Update data in the database
    $batsman_rank_update = "UPDATE `batting_ranks` SET `Ranks`='$Ranks', `batsman_photo`='$batsman_photo', `Batsman_name`='$Batsman_name', `rating`='$rating' WHERE Id = $id";
    $check_query = mysqli_query($conn, $batsman_rank_update);

    if (!$check_query) {
        $_SESSION['error_while_updating'] = "Error updating data: " . mysqli_error($conn);
    } else {
        $_SESSION['batsman_update'] = "Batsman data updated successfully";
    }

    header("location: batsmanranking.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Batsman Rank</title>
</head>
<style>
     body {
      background: linear-gradient(to bottom, #000000, #0000FF) !important;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
</style>

    <?php
    if (isset($_SESSION["error"])) {
        echo '
            <script>
                Swal.fire({
                    text: "You clicked the button!",
                    icon: "error",
                    html: "' . $_SESSION["error"] . '"
                         });
            </script>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION["batsman_update"])) {
        echo '
            <script>
                Swal.fire({
                    text: "You clicked the button!",
                    icon: "batsman_update",
                    html: "' . $_SESSION["batsman_update"] . '"
                         });
            </script>';
        unset($_SESSION['batsman_update']);
    }
    if (isset($_SESSION["error_while_updating"])) {
        echo '
            <script>
                Swal.fire({
                    text: "You clicked the button!",
                    icon: "error_while_updating",
                    html: "' . $_SESSION["error_while_updating"] . '"
                         });
            </script>';
        unset($_SESSION['error_while_updating']);
    }
    ?>
    <body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 bg-light" style="border-radius:10px;opacity:0.8;" data-aos="slide-down" data-aos-duration="2000">
                <form action="update_bat_rank.php" method="post" id="updateForm" enctype="multipart/form-data" data-aos="fade-in" data-aos-duration="2000">
                    <h5 class="text-center text-dark my-3">BATSMAN RANKS</h5>
                    <hr>
                    <input type="hidden" name="update_batsman_rank" value="<?php echo $Id_update ?>">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label my-2">Rank</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $Ranks ?>"
                            name="Ranks" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label my-2">Batsman Image</label><br>
                        <input type="file" name="new_image" class="form-control">
                        <img src="<?php echo $batsman_photo ?>" class="my-3" alt="Batsman Image" height="80px"
                            width="80px" style="border-radius:50%;">
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label my-2">Batsman Name</label>
                        <input type="text" class="form-control" name="Batsman_name" value="<?php echo $Batsman_name ?>"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom06" class="form-label my-2">Rating</label>
                        <input type="text" class="form-control" id="validationCustom06" value="<?php echo $rating ?>"
                            name="rating" required>
                    </div>
                    <div class="col-3">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary my-2" type="submit">UPDATE PLAYER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    </html>



    <!-- this page paste in 000webhost -->
<?php
    include "includes/header.php";
    session_start();
    include "config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Asset/datatables.min.css">
    <!-- <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> -->
    <!-- for icon cdn path -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<!-- style start -->
<style>
      body {
        background: linear-gradient(to bottom, #000000, #0000FF);
        height: 100vh;
        display: flex;
        justify-content: center;
    }

    .bg {
        background-color: white;
        opacity: 0.8;
        border-radius: 15px !important;
    }


    @media (max-width: 576px) {
    .table-responsive {
        max-height: 500px;
    }
}
</style>
<!-- style end -->

<body class="">
    <div class="container">
        <div class="col-12 p-3" id="mySidenav">
            <a href="Userdash.php" class="btn btn-primary" id="back"><i class="ion-android-arrow-back"></i></a>
        </div>
        <div class="row mt-5 shadow-div">
            <!-- user profile code here -->
            <div class="col-lg-6 col-sm-12 my-1">
                <!-- here show session message -->
                <?php
                if (isset($_SESSION["delete_message"])) {
                    echo '
                    <script>
                        Swal.fire({
                            text: "You clicked the button!",
                            icon: "error",
                            html: "' . $_SESSION["delete_message"] . '"
                        });
                    </script>
                    ';
                    unset($_SESSION['delete_message']);
                }

                if (isset($_SESSION["bowler_update"])) {
                    echo '
                    <script>
                        Swal.fire({
                            text: "You clicked the button!",
                            icon: "error",
                            html: "' . $_SESSION["bowler_update"] . '"
                        });
                    </script>
                    ';
                    unset($_SESSION['bowler_update']);
                }
                ?>

                <div class="card bg w-100" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-body">
                        <?php
                        // SQL query with JOIN
                        $user_check_id = $_SESSION['user_auth']['id'];
                        $slt = "SELECT * from signup WHERE signup.Id = $user_check_id";
                        $checkquer = mysqli_query($conn, $slt);
                        if ($row = mysqli_fetch_assoc(($checkquer))) {
                            $Name = $row['Name'];
                            $age = $row['age'];
                            $phone = $row['phone'];
                        }
                        ?>
                        <h4 class="card-title">
                            <span class="glow">Profile Details</span>
                        </h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-6 col-form-label">Name:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="name" class="form-control-static">
                                    <span class="glow">
                                        <?php echo $Name ?>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matches" class="col-sm-6 col-form-label">Age:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="matches" class="form-control-static">
                                    <?php echo $age ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Phone:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $phone ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user career status here -->
            <!-- <div class="col-lg-9 col-sm-12 my-1 bg card">
            <div class="table-responsive">
                    <table id="mytable" class="table table-striped table-hover">
                        <h4 class="glow text-primary">Player Career Status</h4>
                        <thead>
                            <tr>
                                <th>Matches</th>
                                <th>Innings</th>
                                <th>Runs Score</th>
                                <th>Wickets</th>
                                <th>Highest Wickets</th>
                                <th>Average</th>
                                <th>Strike Rate</th>
                                <th>Economy</th>
                                <th>Highest Score</th>
                            </tr>
                        </thead>
                        <?php
                        // SQL query with JOIN
                        // $user_check_id = $_SESSION['user_auth']['id'];
                        // $slt = "SELECT * from signup WHERE signup.Id = $user_check_id";
                        // $checkquer = mysqli_query($conn, $slt);

                        // ?>
                        <tbody>
                            <?php
                            // while ($row = mysqli_fetch_assoc($checkquer)) {
                            //     echo "<tr>";
                            //     echo "<td>" . $row["runs"] . "</td>";
                            //     echo "<td>" . $row["wickets"] . "</td>";
                            //     echo "<td>" . $row["highest_wickets"] . "</td>";
                            //     echo "<td>" . $row["average"] . "</td>";
                            //     echo "<td>" . $row["strike_rate"] . "</td>";
                            //     echo "<td>" . $row["economy"] . "</td>";
                            //     echo "<td>" . $row["highest_score"] . "</td>";
                            //     // echo '<td>
                            //     // <a href="delete.php?member_Delete_id=' . $row["id"] . '" class=""><i class="ion-trash-b text-danger fs-4"></i></a>
                            //     // </td>';
                            //     echo "</tr>";
                            // }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- DataTables JavaScript -->
    <script src="Asset/datatables.min.js"></script>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- DataTable initialization -->
    <script>


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // password validation
        function validateForm() {
            var passwordInput = document.getElementById("password");
            var passwordError = document.getElementById("passwordError");
            var password = passwordInput.value;

            if (password.length < 8) {
                passwordInput.classList.add("is-invalid");
                passwordError.style.display = "block";
                return false;
            } else {
                passwordInput.classList.remove("is-invalid");
                passwordError.style.display = "none";
                return true;
            }
        }
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
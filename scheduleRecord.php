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

    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
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
        <div class="col-6 p-3" id="mySidenav">
            <a href="Userdash.php" class="btn btn-primary" id="back"><i class="ion-android-arrow-back"></i></a>
        </div>
        <!-- matches schedules -->
        <div class="row mt-5 d-flex align-items-start justify-content-center shadow-div">
            <div class="col-lg-6 col-sm-12" data-aos="fade-up-left" data-aos-duration="1500">
                <div class="table-responsive shadow p-3 mb-5 bg-light rounded">
                    <table class="table table-striped m-1 border">
                        <h3 class="text-secondary">Matches Schedule</h3>
                        <hr>
                        <?php
                        if (isset($_SESSION["schedule_ended"])) {
                            echo '
                            <script>
                                Swal.fire({
                                    text: "You clicked the button!",
                                    icon: "error",
                                    html: "' . $_SESSION["schedule_ended"] . '"
                                });
                            </script>
                            ';
                            unset($_SESSION['schedule_ended']);
                        }
        
                        ?>
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Team 1</th>
                                <th>VS</th>
                                <th scope="col">Team 2</th>
                            </tr>
                        </thead>
                        <?php
                        $slt_schedule = "SELECT * FROM `schedule`";
                        $check_schedule = mysqli_query($conn, $slt_schedule);
                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($check_schedule)) {
                                echo "<tr>";
                                echo "<td class='w-25'>" . $row['date'] . "</td>";
                                echo "<td class='w-25'>" . $row['team1'] . "</td>";
                                echo "<td class='w-25'>VS</td>";
                                echo "<td class='w-25'>" . $row['team2'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- matches Result -->
            <div class="col-lg-3" data-aos="fade-down-right" data-aos-duration="1500">
                <div class="card bg-light p-3">
                    <table class="table table-striped m-1 border">
                        <h3 class="text-secondary">Matches Result</h3>
                        <hr>
                        <?php
                        if (isset($_SESSION["schedule_res"])) {
                            echo '
                            <script>
                                Swal.fire({
                                    text: "You clicked the button!",
                                    icon: "error",
                                    html: "' . $_SESSION["schedule_res"] . '"
                                });
                            </script>
                            ';
                            unset($_SESSION['schedule_res']);
                        }
                        ?>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Match Result</th>
                            </tr>
                        </thead>
                        <?php
                        $res_schedule = "SELECT * FROM `schedule`";
                        $check_res_schedule = mysqli_query($conn, $res_schedule);
                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($check_res_schedule)) {
                                echo "<tr>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['result'] . "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
        $(document).ready(function () {
            $('#record2table').DataTable();
        });


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
    <!-- animator script tag -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>
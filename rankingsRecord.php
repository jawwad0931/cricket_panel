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

.first-row {
    font-size: 1.2em; /* Larger font size for the first row */
}

.normal-row {
    font-size: 1em; /* Normal font size for other rows */
}

</style>
<!-- style end -->

<body class="">
    <div class="container">
        <div class="col-12 p-3" id="mySidenav">
            <a href="Userdash.php" class="btn btn-primary" id="back"><i class="ion-android-arrow-back"></i></a>
        </div>
        <div class="row mt-5 d-flex align-items-center justify-content-center shadow-div">
            <div class="col-lg-11 col-sm-12 p-2 bg"  data-aos="fade-up" data-aos-duration="1500">
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
                   <div class="table-responsive p-2">
                    <table id="batsman_table" class="display m-3">
                    <thead>
                        <tr>
                            <th>Ranks</th>
                            <th>Batsman Name</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <?php
                    $fetchingBatsmanrank = "SELECT * FROM `batting_ranks`";
                    $checking_batsman_rank = mysqli_query($conn, $fetchingBatsmanrank);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($checking_batsman_rank)) {
                            echo "<tr>";
                            echo "<td>" . $row["Ranks"] . "</td>";
                            echo "<td class='d-flex align-items-center justify-content-start'>";
                            echo "<img src='" . $row["batsman_photo"]. "' class='rounded-circle' height='50px' width='50px' >" . "<h6 class='my-3 mx-4'>" . $row['Batsman_name'] . "</h6>";
                            echo "</td>" ;
                            echo "<td>" . $row["rating"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
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
            $('#batsman_table').DataTable();
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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<?php
session_start();
include "includes/header.php";
include "config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Asset/datatables.min.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<!-- style start -->
<style>
    body {
        /* Set the background image  */
        background-image: url('images/stadium2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    .bg {
        background-color: white;
        width: 60%;
        opacity: 0.8;
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
<body class="bg-light">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-end">
            <div class="col-lg-3 col-sm-12 col-md-12">
                <div class="card my-3 p-3">
                    <h6 class="">Profile Detail</h6>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add <i class="ion-plus-circled"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Player</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="signcode.php" method="post" class="row g-3 p-4 needs-validation"
                                        id="passwordForm" onsubmit="return validateForm()" novalidate>
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                name="Name" required>
                                            <div class="invalid-feedback">
                                                Please fill Name.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Age</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="age" required>
                                            <div class="invalid-feedback">
                                                Please fill Age.
                                            </div>

                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Phone.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Password.
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2">
                                                <input class="btn btn-primary" name="AddPlayer" type="submit" value="Add Player">
                                            </div>
                                        </div>
                                        <?php 
                                            if (isset($_SESSION["memeberAdded"])) {
                                                echo '
                                                <script>
                                                    Swal.fire({
                                                        title: "Good job!",
                                                        text: "You clicked the button!",
                                                        icon: "success",
                                                        html: "'.$_SESSION["memeberAdded"].'"
                                                    });
                                                </script>
                                                ';
                                                unset($_SESSION['memeberAdded']);
                                            }
                                            if (isset($_SESSION["member"])) {
                                                echo '
                                                <script>
                                                    Swal.fire({
                                                        title: "Good job!",
                                                        text: "You clicked the button!",
                                                        icon: "success",
                                                        html: "'.$_SESSION["member"].'"
                                                    });
                                                </script>
                                                ';
                                                unset($_SESSION['member']);
                                            }
                                        ?>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 d-flex align-items-center justify-content-end shadow-div">
            <div class="col-lg-11 col-sm-12 p-2 bg">
                <div class="table-responsive p-3">
                    <table id="mytable" class="display p-2">
                    <?php 
                         if (isset($_SESSION["member_update"])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            echo $_SESSION["member_update"];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['member_update']);
                        }
                    ?> 
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        // SQL query with JOIN
                        $fetchingData = "SELECT * FROM signup";
                        $checking_data = mysqli_query($conn, $fetchingData);

                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($checking_data)) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["age"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo '<td>
                                <a href="memberupdate.php?member_updid=' . $row["id"] . '" class="p-1"><i class="ion-edit text-success fs-4"></i></a>
                                <a href="delete.php?member_Delete_id=' . $row["id"] . '" class=""><i class="ion-trash-b text-danger fs-4"></i></a>
                                </td>';
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
    //
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
            $('#mytable').DataTable();
        });
    </script>
</body>

</html>
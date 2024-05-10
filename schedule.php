<?php
session_start();
include 'config/conn.php';
?>

<style>
    body {
        /* Set the background image  */
        background-image: url('images/stadium2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    .table-responsive {
        overflow-x: auto;
        max-width: 100%;
    }

    table tr td{
        width: 25px;
    }

    /* responsiveness for table */
    @media (max-width: 576px) {
        .table-responsive {
            max-height: 300px;
        }
</style>
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-3 col-sm-12">
        <form action="signcode.php" method="post" class="row shadow p-3 mb-5 bg-light rounded m-1 needs-validation border" id="passwordForm" onsubmit="return validateForm()" novalidate>
                <h4 class="text-secondary">New Schedule</h4>
                <?php
                // for schedule
                if (isset($_SESSION["schedule"])) {
                    echo '
                    <script>
                        Swal.fire({
                            text: "You clicked the button!",
                            icon: "success",
                            html: "'.$_SESSION["schedule"].'"
                        });
                    </script>
                    ';
                    unset($_SESSION['schedule']);
                }


                
                // for schedule complete message
                if (isset($_SESSION["complete"])) {
                    echo '
                    <script>
                        Swal.fire({
                            text: "You clicked the button!",
                            icon: "error",
                            html: "' . $_SESSION["complete"] . '"
                        });
                    </script>
                    ';
                    unset($_SESSION['complete']);
                }

                

                // for schedule Incomplete message
                if (isset($_SESSION["Incomplete"])) {
                    echo '
                    <script>
                        Swal.fire({
                            text: "You clicked the button!",
                            icon: "error",
                            html: "' . $_SESSION["Incomplete"] . '"
                        });
                    </script>
                    ';
                    unset($_SESSION['Incomplete']);
                }
                ?>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Date</label>
                    <input type="date" class="form-control" id="validationCustom01" name="date" required>
                    <div class="invalid-feedback">
                        Please fill date.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Team 1</label>
                    <input type="text" class="form-control" id="validationCustom01" name="team1" required>
                    <div class="invalid-feedback">
                        Please fill team1 name.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Team 2</label>
                    <input type="text" class="form-control" id="validationCustom01" name="team2" required>
                    <div class="invalid-feedback">
                        Please fill team2 name.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Result</label>
                    <input type="text" class="form-control" id="validationCustom01" name="result" required>
                    <div class="invalid-feedback">
                        Please fill Result.
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary my-2" name="AddSchedule" type="submit">New Schedule</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9 col-sm-12 py-1">
            <div class="table-responsive shadow p-3 mb-5 bg-light rounded">
                <table class="table table-striped m-1 border">
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

                    if (isset($_SESSION["Schedule_update"])) {
                        echo '
                        <script>
                            Swal.fire({
                                text: "You clicked the button!",
                                icon: "error",
                                html: "' . $_SESSION["Schedule_update"] . '"
                            });
                        </script>
                        ';
                        unset($_SESSION['Schedule_update']);
                    }
                    ?>
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Team 1</th>
                            <th>VS</th>
                            <th scope="col">Team 2</th>
                            <th scope="col">Result</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Status</th>
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
                            echo "<td class=''>" . $row['date'] . "</td>";
                            echo "<td class=''>" . $row['team1'] . "</td>";
                            echo "<td class='' style='width:10%;'>VS</td>";
                            echo "<td class=''>" . $row['team2'] . "</td>";
                            echo "<td class=''>" . $row['result'] . "</td>";
                            echo '<td class=""style="width:10%;">
                            <a href="UpdateSchedule.php?updid=' . $row["id"] . '" class="p-1"><i class="ion-edit text-success fs-4"></i></a>
                            <a href="delete.php?schedule_id=' . $row["id"] . '" class=""><i class="ion-trash-b text-danger fs-4"></i></a>
                            </td>';


                            echo "<td class='' style='width:10%;'>";
                            if ($row['status'] == "1") {
                                echo "<a href='deactivate.php?deactivateId=" . $row['id'] . "' class='badge rounded-pill bg-danger text-decoration-none text-light'>Pending</a>";
                            } else {
                                echo "<a href='activate.php?activateId=" . $row['id'] . "' class='badge rounded-pill bg-success text-decoration-none text-light'>Finish</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
/* 
    <div class="row">
        <div class="col-lg-3">
            <div class="outer_div m-1 bg-light">

            </div>
        </div>
    </div> */
</div>

<!-- Script cdns -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<!-- DataTables JavaScript -->
<script src="Asset/datatables.min.js"></script>
<!-- boostrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
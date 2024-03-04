<?php
include "includes/header.php";

// How can i do this if i am login which define in user_Auth session variable it has an array 
// when user already logged in and i want to go back login page not possible because i am already logged 
// in its redirect me to dashboard page
session_start();
if(isset($_SESSION['user_auth'])){
    header("location: Userdash.php");
    exit(); // Ensure that script execution stops after redirect
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #mycard1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 600px;
        /* margin-left: 135px !important; */
    }

    #mycard2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 600px;
        /* margin-left: 135px !important; */
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row" class="row_margins">
            <div class="col-12 col-lg-7 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                <div class="card border m-2 bg-light" id="mycard1">
                     <!-- this code check password and confirm password -->
                    <?php 
                        if(isset($_SESSION['invalid_user'])){
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['invalid_user'] . '</div>';
                            unset($_SESSION['invalid_user']);
                        }
                    ?>
                    <form action="usercode.php" method="post" class="row g-3 p-4 needs-validation" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">User Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <!-- <div id="passwordHelpBlock" class="form-text">
                                Your password must be at least 8 characters long and should include uppercase, lowercase letters, numbers, and special characters.
                            </div> -->
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="login" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" class="row_margins">
            <div class="col-12 col-lg-7 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="card border m-2 bg-light" id="mycard2">
                    <div class="m-4">
                        <p>Don't have an account yet?</p>
                        <a href="sign.php" class="text-decoration-none">SignUp!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script tag -->
    <!-- boostrap cdn path -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- Script tag end -->

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
    </script>
</body>

</html>
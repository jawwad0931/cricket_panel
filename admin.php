<?php
include "includes/header.php";

// How can i do this if i am login which define in user_Auth session variable it has an array 
// when user already logged in and i want to go back login page not possible because i am already logged 
// in its redirect me to dashboard page
session_start();
if (isset($_SESSION['admin_auth'])) {
    header("location: admindash.php");
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
    body {
        background-color: #000000;
    }

    #mycard1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 450px;
    }

    #img_logo {
        border-radius: 50px;
    }

    .row_margins {
        height: 700px;
    }

    /* for icon */
    .ico {
        color: #fff !important;
    }

    #form_bg {
        background: linear-gradient(to bottom, #000000, #0000FF);
        /* Black to blue */
        border-radius: 10px;
    }

    /* below the form div */
    .second_div_bg {
        background: linear-gradient(to bottom, #000000, #0000FF);
        /* Black to blue */
    }

    /* Style the placeholder text color */
    .form-control::placeholder {
        color: white;
    }

    /* for button */
     /* for button */
     .btn {
      position: relative;
      display: inline-block;
      margin: 10px;
      color: #fff;
      font-size: 20px !important;
      letter-spacing: 2px;
      border-radius: 5px;
      outline: none;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
      box-sizing: border-box;
      height: 35px;
      width: 80px;
      padding-bottom: 35px;
    }

    .btn--liquidBtn {
      overflow: hidden;
    }

    .btn--liquidBtn span {
      position: relative;
      z-index: 1;
      font-size: 15px;
    }

    .btn--liquidBtn:hover .btn--liquid {
      top: -120px;
    }

    .btn--liquid {
      position: absolute;
      top: -80px;
      left: 0;
      width: 200px;
      height: 200px;
      background: #4973ff;
      box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
      transition: 0.5s;
    }

    .btn--liquid::before,
    .btn--liquid::after {
      content: "";
      position: absolute;
      top: 0;
      left: 50%;
      width: 200%;
      height: 200%;
      transform: translate(-50%, -75%);
    }

    .btn--liquid::before {
      border-radius: 45%;
      background: rgba(20, 20, 20, 1);
      animation: liquidAnimation 10s linear infinite;
    }

    .btn--liquid::after {
      border-radius: 40%;
      background: rgba(20, 20, 20, 0.5);
      animation: liquidAnimation 10s linear infinite;
    }

    @keyframes liquidAnimation {
      0% {
        transform: translate(-50%, -75%) rotate(0deg);
      }
      100% {
        transform: translate(-50%, -75%) rotate(360deg);
      }
    }
</style>

<body>
    <div class="container">
        <!-- this code check password and confirm password -->
        <?php
        if (isset($_SESSION["invalid_user"])) {
            echo '
            <script>
                Swal.fire({
                    text: "You clicked the button!",
                    icon: "error",
                    html: "'.$_SESSION["invalid_user"].'"
                });
            </script>
            ';
            unset($_SESSION['invalid_user']);
        }
        ?>
        <div class="row row_margins d-flex align-items-center justify-content-center">
            <div class="col-lg-4 d-flex align-items-center justify-content-center mt-4">
                <form action="adminCode.php" method="post" class="row g-3 p-4 needs-validation" id="form_bg"
                    data-aos="fade" data-aos-duration="1000" novalidate>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="images/logo.png" height="60px" width="60px" id="img_logo" alt="" data-aos="slide-down"
                            data-aos-duration="3000">
                    </div>
                    <div class="d-flex align-items-center justify-content-center" data-aos="slide-down"
                        data-aos-duration="3000">
                        <h2 class="text-center text-light fw-light">Admin Login</h2>
                    </div>
                    <div class="col-md-12" data-aos="slide-down" data-aos-duration="3000">
                        <div class="input-group border-none">
                            <span class="input-group-text text-dark border-0 ico"
                                style="background-color: transparent;"><i class="ion-person"></i></span>
                            <input type="text" class="form-control border-0" id="validationCustom01"
                                placeholder="Enter Admin Name" name="admin_name"
                                style="background-color: transparent;color: white;" required>
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-12" data-aos="slide-down" data-aos-duration="3000">
                        <div class="input-group border-none">
                            <span class="input-group-text text-dark border-0 ico"
                                style="background-color: transparent;"><i class="ion-locked"></i></span>
                            <input type="password" class="form-control border-0" id="password" name="admin_pass"
                                placeholder="Enter Admin password" style="background-color: transparent;color: white;"
                                required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12 d-flex justify-content-start" data-aos="slide-down"
                        data-aos-duration="3000">
                        <button class="btn btn--liquidBtn btn-sm" name="Admin_login" type="submit">
                            <span>LogIn</span>
                            <div class="btn--liquid"></div>
                        </button><br>
                    </div>
                    <div class="row" style="padding-left:20px;">
                    <a href="index.php" class="text-decoration-none text-light" data-aos="slide-down"
                        data-aos-duration="3000">Back to home!</a>
                    </div>
                </form>

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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
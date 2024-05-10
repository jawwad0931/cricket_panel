<?php
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .custom-bottom-border {
    border: none;
    border-bottom: 1px solid #000; /* You can adjust the color and thickness as needed */
    background-color: transparent;
    color: white;
}
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

    .form_bg {
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

    /* borders */
    .form-control {
        border: none;
        border-bottom: 1px solid #fff;
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
    <div class="container-fluid" style="">
        <div class="row mt-3 d-flex justify-content-center" data-aos="slide-down" data-aos-duration="2000">
            <div class="col-lg-5 col-md-12 col-sm-12 mt-2">
                    <div class="m-4 p-4 form_bg">
                        <h2 class="text-center text-light">Sign Up</h2>
                        <p class="tw-light text-center text-light">Please fill in this form to create an account.</p>
                    </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center" data-aos="zoom-in-up" data-aos-duration="2000">
            <div class="col-lg-5 col-md-12 col-sm-12">
                    <!-- this code check password and confirm password -->
                    <?php
                    session_start();
                    if (isset($_SESSION['pass_check'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['pass_check'] . '</div>';
                        unset($_SESSION['pass_check']);
                    }
                    ?>
                    <!-- End php code -->
                    <div class="m-4 p-3 bg-light form_bg">
                    <form action="signingcode.php" method="post" class="row p-4 needs-validation" id="passwordForm" onsubmit="return validateForm()"  novalidate>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Enter name" name="name"
                                style="background-color: transparent;color: white;" required>
                                <span class="custom-bottom-border "></span>
                        </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="input-group mt-3 border-none">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Enter age" name="age"
                                style="background-color: transparent;color: white;" required>
                                <span class="custom-bottom-border "></span>
                        </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="input-group mt-3 border-none">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Enter phone" name="phone"
                                style="background-color: transparent;color: white;" required>
                                <span class="custom-bottom-border "></span>
                        </div>
                            <div class="invalid-feedback">
                                Please Enter a Phone number.
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="input-group mt-3 border-none">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Enter password" name="password"
                                style="background-color: transparent;color: white;" required>
                                <span class="custom-bottom-border "></span>
                        </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                             <div class="input-group mt-3 border-none">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Confirm password" name="confirm_password"
                                style="background-color: transparent;color: white;" required>
                                <span class="custom-bottom-border "></span>
                        </div>
                        </div>
                        <div class="col-12 my-2">
                            <a href="user.php" class="text-decoration-none text-light">Already have an account login here!</a>
                        </div>
                            <button class="btn btn--liquidBtn btn-sm" name="signup" type="submit">
                            <span>Sign Up</span>
                            <div class="btn--liquid"></div>
                        </button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- boostrap cdn path -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- for animator -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
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
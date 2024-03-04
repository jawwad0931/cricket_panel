<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Asset/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<!-- Style -->
<style>
    body{
        background-image: url("images/cricket.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .firstcont {
        background-image: linear-gradient(rgba(0, 100, 0, 0.5), rgba(0, 0, 0, 0.5)), url("#");
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    #mySidenav a {
        position: absolute;
        left: 0px;
        transition: 0.3s;

        padding: 15px;
        width: 200px;
        text-decoration: none;
        font-size: 20px;

        border-radius: 0 5px 5px 0;
    }

    #mySidenav a:hover {
        left: 50px;
    }

    .carousel_sizing {
        height: 550px;
        width: 250px;
    }

    .icon-bar {
        position: fixed;
        top: 55%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0px;
        bottom: 0px;
    }

    .icon-bar a {
        display: block;
        text-align: center;
        padding: 15px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .facebook {
        background: #3B5998;
        color: white;
    }

    .twitter {
        background: #55ACEE;
        color: white;
    }

    .google {
        background: #dd4b39;
        color: white;
    }

    .linkedin {
        background: #007bb5;
        color: white;
    }

    .youtube {
        background: #bb0000;
        color: white;
    }
    .breaker{
        height: 20px;
    }
</style>
<!-- Style -->


<!-- <body> -->
<body>
    <!-- Top section -->
    <div class="container-fluid p-3 firstcont">
        <div class="row p-5">
            <div id="mySidenav" class="sidenav">
                <a href="User.php" class="btn btn-dark" id="user">User Login</a><br><br><br>
                <a href="admin.php" class="btn btn-primary" id="admin">Admin Login</a><br><br><br>
            </div>
            <div class="col-12 p-5 text-center">
                <h2 class="pb-3 text-light">Royal Blasters</h2>
                <p class="text-light">The all in one cricket manager for the underdog cricket league</p>
                <a href="about.php" class="btn btn-outline-light">ABOUT ROYAL BLASTER</a>
            </div>
        </div>
    </div>

    <!-- Mid section -->
    <div class="container">
        <div class="row m-5">
            <hr class="text-light fw-bold breaker">
            <h2 class="text-center text-light">Cricket Tournament</h2>
            <hr class="text-light fw-bold breaker">
            <div class="col-12">
                <div id="carouselExample" data-bs-ride="carousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/cricket.jpg" class="d-block w-100 carousel_sizing" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/cricket.jpg" class="d-block w-100 carousel_sizing" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/cricket.jpg" class="d-block w-100 carousel_sizing" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="icon-bar">
                    <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="google"><i class="fa fa-google"></i></a>
                    <a href="https://www.linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    <a href="https://www.youtube.com/" class="youtube"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<?php
include "includes/footer.php";
?>
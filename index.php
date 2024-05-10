

<?php 
  include  'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- favicon -->
  <!-- ./ its mean outside the directory and then ./images it mean reach inside the images directory and access image -->
  <link rel="icon" href="./images/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="Asset/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- google font family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
  <title>Document</title>

  <!-- Style -->
  <style>
    body {
      background: linear-gradient(to bottom, #000000, #0000FF);
      display: flex;
      min-height: 100vh; /* Ensure body takes at least full height of viewport */
      align-items: center;
      justify-content: center;
    }

    /* admin & user buttons */
    /* CSS */
    .a-85 {
      padding: 0.6em 2em;
      border: none;
      outline: none;
      color: rgb(255, 255, 255);
      background: #111;
      cursor: pointer;
      position: relative;
      z-index: 0;
      border-radius: 10px;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      height: 40px;
      width: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .a-85:hover {
      color: #fff;
    }

    .a-85:before {
      content: "";
      background: linear-gradient(45deg,
        #ff0000,
        #ff7300,
        #fffb00,
        #48ff00,
        #00ffd5,
        #002bff,
        #7a00ff,
        #ff00c8,
        #ff0000);
      position: absolute;
      top: -2px;
      left: -2px;
      background-size: 400%;
      z-index: -1;
      filter: blur(5px);
      -webkit-filter: blur(5px);
      width: calc(100% + 4px);
      height: calc(100% + 4px);
      animation: glowing-a-85 20s linear infinite;
      transition: opacity 0.3s ease-in-out;
      border-radius: 10px;
    }

    @keyframes glowing-a-85 {
      0% {
        background-position: 0 0;
      }

      50% {
        background-position: 400% 0;
      }

      100% {
        background-position: 0 0;
      }
    }

    .a-85:after {
      z-index: -1;
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: #000;
      left: 0;
      top: 0;
      border-radius: 10px;
    }

     #img_parent{
      height: 150px;
      width: 150px;
    }

    #img_parent img {
      height: 100%;
      width: 100%;
      padding: 10px;
    }

    .heading {
    }

    @media screen and (max-width: 576px) {
      .heading {
        padding-left: 0 !important;
      }
    }

    @media screen and (max-width: 768px) {
      .carousel-item img {
        height: 250px;
      }

      .firstcont {
        padding: 1rem; /* Add padding to the container */
      }
    }
  </style>
  <!-- Style -->
</head>

<body>
  <!-- Top section -->
  <div class="container-fluid firstcont">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
        <div id="img_parent">
          <img src="./images/logo.png" class="my-2 rounded-circle" alt="" data-aos="zoom-out" data-aos-duration="3000">
        </div>
      </div>
      <div class="row my-2">
        <div class="col-12 justify-content-center w-100">
          <h2 class="pb-3 text-light text-center heading" data-aos="zoom-in-up" data-aos-duration="3000">Royal Blasters</h2>
          <p class="text-light text-center w-100" data-aos="zoom-in-up" data-aos-duration="3000">The all in one cricket manager <br> for the underdog cricket league</p>
        </div>
      </div>
      <div class="row my-2">
        <div class="col-12">
          <div id="mySidenav" class="sidenav d-flex align-items-center justify-content-center">
            <a href="user.php" class="a-85 text-decoration-none fs-5" role="a" data-aos="zoom-in-left" data-aos-duration="3000">User</a><br><br><br>
            <a href="admin.php" class="a-85 text-decoration-none fs-5 mx-1" role="a" data-aos="zoom-in-right" data-aos-duration="3000">Admin</a>
            <!-- <a href="admin.php" class="btn btn-dark btn-sm  mx-2" id="admin"><img src="images/admin.png" height="25px" width="25px" class="border-rounded border-light mx-2">Admin Login</a><br><br><br> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>

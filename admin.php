
<?php 
    include "includes/header2.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #mycard1{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 600px;
        /* margin-left: 135px !important; */
    }
    #mycard2{
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
                <form class="row g-3 p-4 needs-validation" novalidate>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="validationCustom01" class="form-label">Admin Name</label>
                            <input type="text" class="form-control" id="validationCustom01" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="validationCustom02" class="form-label">Admin Password</label>
                            <input type="text" class="form-control" id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button">Log In</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
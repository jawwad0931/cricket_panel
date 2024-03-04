<?php
session_start();
include 'config/conn.php';
?>
<?php
// Check if the form is submitted
if (isset($_POST['signup'])) {
    // Check if the selected_option is set in the POST data
    if (isset($_POST["agree_terms"])) {
        // Get the selected option value
        $Name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirm-password'];
        $batting = $_POST['batting'];
        $balling = $_POST['balling'];
        $playing_role = $_POST['playing_role'];
        $address = $_POST['address'];
        $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;


        // password & confirm password check
        if($password == $confirmpassword){
            // Prepare an SQL statement to insert data into your table (replace 'your_table' with your table name)
            $sql = "INSERT INTO `signup` (`Name`, `playing_role`, `age`, `sex`, `country`, `phone`, `password`, `batting`, `balling`, `address`,`agree_terms`) VALUES ('$Name', '$playing_role', '$age', '$sex', '$country', '$phone', '$password', '$batting', '$balling','$address',$agree_terms)";
            $checkquery = mysqli_query($conn, $sql);

            if($checkquery){
                header("location: user.php");
                exit(0);
            }
        }else{
            header("location: sign.php");
            $_SESSION['pass_check'] = "password not match";
            exit(0);
    }
}
}
?>

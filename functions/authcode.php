<?php
session_start();
include('../config/dbcon.php');
if(isset($_POST['register_btn']))
{
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $country = mysqli_real_escape_string($con,$_POST['country']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $state = mysqli_real_escape_string($con,$_POST['state']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $zip = mysqli_real_escape_string($con,$_POST['zip']);

    // Email Check
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con,$check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['message'] = "Email already registered";
        header('Location: register.php');
    }
    else{
        if($password == $confirmpassword){
            // Query Insert
            $insert_query = "INSERT INTO users(username,password,email,FromCountry,FromPhone, FromAddress1,FromCity,FromZip,FromState) VALUES ('$username','$password','$email','$country','$phone','$address','$city','$zip','$state')";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if($insert_query_run){
                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../index.php');
            }
            else{
                $_SESSION['message'] = "Something went wrong";
                header('Location: register.php');
            }
        }
        else {
            $_SESSION['message'] = "Passwords don't match";
            header('Location: register.php');
        }
    }

    
}
?>
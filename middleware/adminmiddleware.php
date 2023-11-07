<?php
include("../functions/myfunctions.php");


if (isset($_SESSION['auth'])) 
{
    if ($_SESSION['role']!= 1) 
    {
        redirect("../index.php", "You are not admin");
    }
} 

else 
{
    redirect("../login.php", "Login to continue");
    
}

?>
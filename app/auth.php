<?php
header('Access-Control-Allow-Origin: *'); //Cross domain ajaxs calls
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,HEAD,OPTIONS');

    $servername = "localhost";
    $username = "myfeeds_be";
    $password = "Odisee1207TweedeJaar";
    $dbname = "myfeeds_be";
    
    $con = new mysqli($servername, $username, $password, $dbname);

    //$con = mysqli_connect("localhost","root","root","codesundar") or die("connection error");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(isset($_POST['register']))
    {   
        $register = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `usersApp` WHERE `email`='$email'"));
        if($register == 0)
        {
            $insert = mysqli_query($con,"INSERT INTO `usersApp` (`email`,`password`) VALUES ('$email','$password')");
            if($insert)
                echo "success";
            else
                echo "error";
        }
        else if($register != 0)
            echo "exist";
    }
    else if(isset($_POST['login']))
    {
        $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `usersApp` WHERE `email`='$email' AND `password`='$password'"));
        if($login != 0)
            echo json_encode(array('response' => "success"));
            //echo "success";
        else
            echo "error";
    }
    mysqli_close($con);
?>



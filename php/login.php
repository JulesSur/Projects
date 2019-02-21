<?php

header('Access-Control-Allow-Origin: *'); //Cross domain ajaxs calls

session_start();

//Cannot Modify Header Information - Ik snap niet wat dit doet maar lost het probleem op met de Modifing van de header
ob_start();


if(isset($_POST['submit'])){
    include 'dbLogin.php';
    
    $uid = mysqli_real_escape_string($conn, $_POST['mail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //Error checkers
    
    if(empty($uid) || empty($pwd)){
        header("Location: ../index.php?login=empty");
        exit();
    }else{
        $sql = "SELECT * from users WHERE user_mail = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){
            header("Location: ../index.php?login=error");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //Dehashing het wachtwoord
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if($hashedPwdCheck == false){
                    header("Location: ../index.php?login=error");
                    exit();
                }elseif($hashedPwdCheck == true){
                    //Login de gebruiker
                    $_SESSION['u_id'] = $row['user_mail'];
                    header("Location: overview.php?login=success");
                    //header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
}else{
        header("Location: ../index.php?login=error");
        exit();
    }
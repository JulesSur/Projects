<?php
//Cannot Modify Header Information - Ik snap niet wat dit doet maar lost het probleem op met de Modifing van de header
ob_start();


//checken of de gebruiken wel degelijk op de submit knop heeft gedrukt (veiligheids maatregel)
if(isset($_POST['submit'])){
    
    include_once 'dbLogin.php';
    
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //Error checkers - als er velden leeg zijn voer dan deze code uit
    if(empty($mail) || empty($pwd)){
        header("Location: ../registreren.php?registreren=empty");
        exit();    
    }else{
        //Check of de input characters wel toegestaan zijn
        if(preg_match("/^[a-zA-Z]*$/", $mail)){
            header("Location: ../registreren.php?signup=invalid");
            exit();    
        }else{
            //Check of mail wel een mail is
            if(filter_var($mail, FIlTER_VALIDATE_EMAIL)){
                header("Location: ../registreren.php?registreren=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE user_mail = '$mail'";
                $result = mysqli_query($conn, $sql);
                //=> 
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    echo "<script type='text/javascript'>alert('Woeps, uw mail adres is al in gebruik!')</script>";
                    //header("Location: ../registreren.php?registreren=mailAlInGebruik");
                    exit();
                }else{
                    //HASH het wachtwoord
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Inserd de gebruiker in de databank
                    $sql = "INSERt INTO users (user_mail, user_pwd) VALUES ('$mail', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../paginas/Overview.html");
                    exit();
                }
            }
        }
    }
    
}else{
    header("Location: ../registreren.php");
    exit();
}

?>
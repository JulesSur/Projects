 <?php
    $servername = "localhost";
    $username = "myfeeds_be";
    $password = "Odisee1207TweedeJaar";
    $dbname = "myfeeds_be";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
       
   $UID = $_POST['postUID'];
   $ArtikelID = $_POST['postArtikelID'];
   
   $sql = "INSERT INTO Likes (UID, ArtikelID) VALUES ('$UID','$ArtikelID')";
   
   if(!mysqli_query($conn,$sql)){
       echo 'Er is een probleem met het toegevoegen aan de databank';
   }
   else{
       echo'Artikel is toegevoegd aan de databank';
   }
?>

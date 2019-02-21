 <?php
    $servername = "localhost";
    $username = "myfeeds_be";
    $password = "Odisee1207TweedeJaar";
    $dbname = "myfeeds_be";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
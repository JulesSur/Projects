
 <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>

    
<?php
    include 'dbLogin.php';

    $limit = $_GET['limit'];
    $offset= $_GET['offset'];


    $sql= "SELECT * FROM Artikels ORDER BY ammountID DESC LIMIT {$limit} OFFSET {$offset}";
   

    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data)>0){
            while ($row = mysqli_fetch_array($data)){
                        echo '<div class="item">';
                        echo '<img src="' . $row['afbeelding'] . '"/>';
                        
                        echo '<div class="source">';
                            //Bron vermeldingen
                                //Bron vermelding HLN
                                if (strpos($row[link], 'www.hln.be/sport') !== false) {
                                    echo '<p><img src="../img/feedsLogos/HLNLogo.png">Sport</p>';
                                }
                                elseif(strpos($row[link], 'www.hln.be/nieuws/buitenland') !== false){
                                    echo '<p><img src="../img/feedsLogos/HLNLogo.png">Buitenenland</p>';
                                }                    
                                elseif(strpos($row[link], 'www.hln.be/nieuws/binnenland') !== false){
                                echo '<p><img src="../img/feedsLogos/HLNLogo.png">binnenland</p>';
                                }
                                elseif(strpos($row[link], 'www.hln.be/reizen') !== false){
                                echo '<p><img src="../img/feedsLogos/HLNLogo.png">reizen</p>';
                                }
                                elseif(strpos($row[link], 'www.hln.be/ihln') !== false){
                                echo '<p><img src="../img/feedsLogos/HLNLogo.png">iHLN</p>';
                                }
                                elseif($row[source] == 'NYT > Home Page'){
                                echo '<p><img src="../img/feedsLogos/NYLogo.png">NYT</p>';
                                }
                                else{
                                    echo '<p>' . $row[source] . '</p>';
                                }
                        echo '</div>';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '<a href="'. $row[link] .'" target="artikel"><i class="fas fa-chevron-circle-right"></i>Bekijk meer</a><br>';
                        echo '<span class="toevoegen">' . $row[ammountID] . '</span>';
                        //echo '<span>' . substr($row[pubDate], 4,-14) . '</span>';
                    echo '</div>';
                    }
    }

 
$sqlToegevoegd = "SELECT ArtikelID FROM Likes l LEFT OUTER JOIN Artikels a ON l.ArtikelId = a.ammountID";


?>



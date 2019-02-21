
<?php

include 'dbLogin.php';
 
 
if(isset($_GET['Filter']) && isset($_GET['offsetFilter']) && isset($_GET['limitFilter'])){
    $limitFilter = $_GET['limitFilter'];
    $offsetFilter= $_GET['offsetFilter'];
    $Filter = $_GET['Filter'];
    
    $filter= '';
    $filterURL= '';
    
    if($Filter == 'Binnenland De Standaard : Binnenland'){
        $filter= 'source LIKE "De Standaard : Binnenland"';
    }
    elseif($Filter == 'Cultuur en media De Standaard : Cultuur en media'){
        $filter= 'source LIKE "De Standaard : Cultuur en media"';
    }
    elseif($Filter == 'Sport De Standaard : Sport'){
        $filter= 'source LIKE "De Standaard : Sport"';
    }
    elseif($Filter == 'Trendy De Standaard : Homepage'){
        $filter= 'source LIKE "De Standaard : Homepage"';
    }
    elseif($Filter == 'Buitenland De Standaard : Buitenland'){
        $filter= 'source LIKE "De Standaard : Buitenland"';
    }
    elseif($Filter == 'Biz De Standaard : Biz'){
        $filter= 'source LIKE "De Standaard : Biz"';
    }
    elseif($Filter == 'BinnenlandHLN Binnenland'){
        $filter= 'link LIKE "%www.hln.be/nieuws/binnenland%"';
    }
    elseif($Filter == 'BuitenlandHLN Buitenland'){
        $filter= 'link LIKE "%www.hln.be/nieuws/buitenland%"';
    }
    elseif($Filter == 'iHLNHLN IHLN'){
        $filter= 'link LIKE "%www.hln.be/ihln%"';
    }
    elseif($Filter == 'SportHLN Sport'){
        $filter= 'link LIKE "%www.hln.be/sport%"';
    };
    


    
    if($Filter == ''){
        $sql= "SELECT * FROM Artikels ORDER BY ammountID DESC";
    }
    
    else{
        $sql = "SELECT * FROM Artikels WHERE $filter ORDER BY ammountID DESC LIMIT {$limitFilter} OFFSET {$offsetFilter}";
    }
    
    

    
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
                        //echo '<span>' . $row[ammountID] . '</span>';
                        //echo '<span>' . substr($row[pubDate], 4,-14) . '</span>';
                        
                    echo '</div>';
                    }
    }
}

?>

<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>

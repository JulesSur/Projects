<?php
header('Access-Control-Allow-Origin: *'); //Cross domain ajaxs calls
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,HEAD,OPTIONS');

    include '../../php/dbLogin.php';

    $limit = $_GET['limit'];
    $offset= $_GET['offset'];

    $sql= "SELECT * FROM Artikels WHERE source like 'Laatste artikels van editiepajot%' ORDER BY ammountID DESC LIMIT {$limit} OFFSET {$offset}";
   

    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data)>0){
            while ($row = mysqli_fetch_array($data)){
                        echo '<a href="'. $row[link] .'" target="artikel"><div class="item">';
                                    
                            echo '<div class="source" id="sourcePajot">';
                                    if (strpos($row[source], 'Laatste artikels van editiepajot.com voor Halle') !== false) {
                                        echo '<p>Halle</p>';
                                    }
                                    elseif(strpos($row[source], 'Laatste artikels van editiepajot.com voor alle gemeenten') !== false){
                                        echo '<p>Alle gemeenten</p>';
                                    }                    
                                    elseif(strpos($row[link], 'www.hln.be/nieuws/binnenland') !== false){
                                    echo '<img src="img/feedsLogos/HLNLogo.png"><p>binnenland</p>';
                                    }
                                    elseif(strpos($row[link], 'www.hln.be/reizen') !== false){
                                    echo '<img src="img/feedsLogos/HLNLogo.png"><p>reizen</p>';
                                    }
                                    elseif(strpos($row[link], 'www.hln.be/ihln') !== false){
                                    echo '<img src="img/feedsLogos/HLNLogo.png"><p>iHLN</p>';
                                    }
                                    elseif($row[source] == 'NYT > Home Page'){
                                    echo '<img src="img/feedsLogos/NYLogo.png"><p>NYT</p>';
                                    }
                                    else{
                                        echo '<p>' . $row[source] . '</p>';
                                    }
                            echo '</div>';
                            echo '<article><h2>' . $row['title'] . '</h2>';
                            echo '<p>' . $row['description'] . '</p></artikel>';
                            echo '<div class="articleFooter"><span>' . substr($row[pubDate], 4,-13) . '</span></div>';
                            //echo '<span class="toevoegen">' . $row[ammountID] . '</span>';
                        
                       
                        echo '</div></a>';
                    }
    }
?>



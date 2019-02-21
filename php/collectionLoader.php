 <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/masonry.js"></script>
    

    
    <script>
                         $(document).ready(function() {
                                    	var total_images = $("body img").length;
                                    	var images_loaded = 0;
                                    
                                    	$("body").find('img').each(function() {
                                    		var fakeSrc = $(this).attr('src');
                                    		$("<img/>").attr("src", fakeSrc).css('display', 'none').load(function() {
                                    			images_loaded++;
                                    			if (images_loaded >= total_images) {
                                    				$("body img").show();
                                    				
                                    				$('#masonry').masonry({
                                                        columWidth: 'div.item',
                                                        itemSelector: 'div.item'
                                                    })
                                    			}
                                    		});
                                    	});
                                    });
    </script>

<?php
    $servername = "localhost";
    $username = "myfeeds_be";
    $password = "Odisee1207TweedeJaar";
    $dbname = "myfeeds_be";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $UID = $_POST['postFeedCollectorUID'];
    $UIDs = "jonasvanobbergen@gmail.com";


    $data = mysqli_query($conn, "SELECT * FROM Likes l LEFT OUTER JOIN Artikels a ON l.ArtikelId = a.ammountID WHERE l.UID like '$UIDs' ORDER BY likesAmmountID DESC");
    if(mysqli_num_rows($data)>0){
        while ($row = mysqli_fetch_array($data)){
                echo '<div class="item">';
                    echo '<img src="' . $row['afbeelding'] . '"/>';
                    echo '<h3>' . $row[title] . '</h3>';
                    //echo '<p>' . $row['description'] . '</p>';
                    echo '<a href="'. $row[link] .'" target="artikel">Bekijk meer</a><br>';
                    echo '<p>' . substr($row[pubDate],0,-14) . '</p>';
                    echo '<p>Toegevoegd door: ' . $row[UID] . '</p>';
                echo '</div>';
                
                }
}else{
    echo $UID;
}

?>




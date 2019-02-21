<?php
header('Access-Control-Allow-Origin: *');
$urls = array(
    //New York Times
    "http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml",
	
	//HLN links
	"https://www.hln.be/nieuws/binnenland/rss.xml",
	"https://www.hln.be/nieuws/buitenland/rss.xml",
	"https://www.hln.be/reizen/rss.xml",
	"https://www.hln.be/sport/rss.xml",
	"https://www.hln.be/ihln/rss.xml"
);
$dataArray = array();

// $url ="http://www.standaard.be/rss/section/1f2838d4-99ea-49f0-9102-138784c7ea7c";

foreach($urls as $urls)
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $urls);

	// $data = curl_exec ($ch);

	$dataArray[] = curl_exec($ch);
	curl_close($ch);
	}


// Connectie met de databank maken
$servername = "localhost";
$username = "myfeeds_be";
$password = "Odisee1207TweedeJaar";
$conn = new mysqli($servername, $username, $password, "myfeeds_be");

// Als de connectie voor 1 of andere reden mislukt geef dan de error weer
if ($conn->connect_error)
	{
    	die("Connection failed: " . $conn->connect_error);
	}

	
//Prepared statemend aanmaken
$stmt = $conn->prepare("INSERT INTO Artikels (ID, afbeelding, title, description, link, pubDate, source) VALUES (?, ?, ?, ?, ?, ?, ?)");

foreach($dataArray as $data)
	{
	$xml = simplexml_load_string($data) or die("Error: Cannot create object");
	foreach($xml->channel->item as $row)
		{
		$ID = $row->link;
		//$afbeelding = $row->enclosure['url'];
		$afbeelding = $row->children( 'media', True )->content->attributes();
		$title = $row->title;
		$description = $row->description;
		$link = $row->link;
		$pubDate = $row->pubDate;
		$source = $xml->channel->title;
		// $pubDate = date_create($pubDate);
        
        //$query = "INSERT INTO Artikels (ID, afbeelding, title, description, link, pubDate, source) VALUES ('$ID', '$afbeelding', '$title', '$description', '$link', '$pubDate', '$source')";
		
		$stmt->bind_param("sssssss", $ID, $afbeelding, $title, $description, $link, $pubDate, $source);
		if ($stmt->execute())
			{
			echo 'Records added successfully.';
			}
		  else
			{
			echo 'ERROR: Could not able to execute $stmt. ' . mysqli_error($conn);
			}

		// mysqli_close($conn);

		}
	}

$stmt->close();
$conn->close();
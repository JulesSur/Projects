<?php
header('Access-Control-Allow-Origin: *');
$urls = array(
    //Standaard links
	"https://www.standaard.be/rss/section/ab8d3fd8-bf2f-487a-818b-9ea546e9a859",
	"https://www.standaard.be/rss/section/1f2838d4-99ea-49f0-9102-138784c7ea7c",
	"https://www.standaard.be/rss/section/e70ccf13-a2f0-42b0-8bd3-e32d424a0aa0",
	"https://www.standaard.be/rss/section/451c8e1e-f9e4-450e-aa1f-341eab6742cc",
	"https://www.standaard.be/rss/section/8f693cea-dba8-46e4-8575-807d1dc2bcb7",
	"https://www.standaard.be/rss/section/afa7bd44-db14-4fab-81c5-427b1ecb8b98",
	
	//Editie Pajot
	"https://editiepajot.com/nieuws_feeds.rss",
	"https://editiepajot.com/regios/7/nieuws_feeds.rss",
	"https://editiepajot.com/regios/12/nieuws_feeds.rss",
	
	//BBC
    "http://feeds.bbci.co.uk/news/uk/rss.xml",
	
	//De Tijd
	"https://www.tijd.be/rss/top_stories.xml",
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
		$afbeelding = $row->enclosure['url'];
		//$afbeelding = $row->children( 'media', True )->content->attributes();
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
<?php
  require_once 'connect.php';
   header('Access-Control-Allow-Origin: *');
  $sql = "SELECT * FROM SONG";
  $result = $conn->query($sql);
  if($result == null){
    echo $result;
    echo 'khong co kq';
  }
// Check if any results were found
  if ($result->num_rows > 0) {
    // Create an array to store the song info
    $songs = array();
    
    // Loop through the results and add the song info to the array
    while($row = $result->fetch_assoc()) {
        $song = array(
            "ID" => $row["ID"],
            "NAME" => $row["NAME"],
            "URL_IMG" => $row["URL_IMG"],
            "SONG_URL" => $row["SONG_URL"]
        );
        array_push($songs, $song);
    }
    
    // Return the singer info as a JSON string
    echo json_encode($songs);
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>
<?php
  // File: response.php

  // Get GET moviename value
  $gender = $_POST["moviename"];

  // Connect to the database
  // replace the parameters with your proper credentials
  $connection = mysqli_connect("localhost", "username", "password", "database_name");

  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM movies_in_db");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'name'   => $row['movie_name'],
      'image' => $row['movie_image']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>

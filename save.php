-0,0 +1,20 @@
<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['player_id'];
  $description = $_POST['player_name'];
  $query = "INSERT INTO player_mast(player_id, player_name) VALUES ('$player_id', '$player_name')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

 /*  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success'; */
  
  header('Location: index.php');
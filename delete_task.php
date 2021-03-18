<?php
/* en 1 borra esta active en la db 1y0 */
include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "UPDATE player_mast set active = 1 WHERE player_id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
<?php
include("db.php");


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  $query = "SELECT *FROM player_mast WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
 
  }
}



  $query = "UPDATE player_mast set player_id = '$player' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message'] ='player_mast Update Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>

<?php include('includes/footer.php');
?> 
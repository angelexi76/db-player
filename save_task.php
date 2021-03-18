<!-- UPDATE FOR CHANGE ACTIVE OF PLAY 1 - 0 FOR ADD -->
<?php

include('db.php');

if (isset($_POST['player'])) {
$player_id = $_POST['player'];


echo $player_id;

$query = "UPDATE player_mast set active = 0 where player_id = $player_id";
$result = mysqli_query($conn, $query);
if(!$result) {
die($query);}

$_SESSION['message'] = 'player_mast Saved Successfully';
$_SESSION['message_type'] = 'success';
header('Location: index.php');

}

?>

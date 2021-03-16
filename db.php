<!--aca para saber si esta funcinando se muestra en el navegador <?php
 $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'torneo'

);

if (isset($conn)){
    echo 'DB connected';
}
?> -->
<?php
/* session_start(); */

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'torneo'
  
  
) or die(mysqli_erro($mysqli));


?>
<?php
session_start();

 $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'torneo'
    ) or die(mysqli_erro($mysqli));
?>
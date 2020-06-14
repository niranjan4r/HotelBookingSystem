<?php

    $servername = "localhost";
    $dBUsername = "root";
    $dbPassword = "";
    $dbName = "hotelusers";

    $conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);
    if (!$conn)
    {
        die ("Connection failed: ".mysqli_connect_error());
    }
?>
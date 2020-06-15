<?php

    $servername = "localhost";
    $dBUsername = "root";
    $dbPassword = "";
    $dbName = "hotelusers";

    $link = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);
    if (!$link)
    {
        die ("Connection failed: ".mysqli_connect_error());
    }
?>
<?php

    if (isset($_GET['room-submit']))
    {
        require "roomdb.php";

        $startDate = $_GET['startdate'];
        $endDate = $_GET['enddate'];
        $roomType = $_GET['roomtype'];

        date_default_timezone_set('Asia/Kolkata'); 
        $todayDate = date('Y-m-d', time());
        $dateLimit = date('Y-m-d', strtotime($todayDate. ' + 90 days')); 
        $noOfDays = 0;

        if ($startDate < $todayDate || $endDate < $todayDate)
        {
            header("location: ../index.php?dateerror=inpast");
            exit();
        }

        else if ($startDate > $endDate)
        {
            header("location: ../index.php?dateerror=largerstart");
            exit();
        }

        else if ($startDate > $dateLimit || $endDate > $dateLimit)
        {
            header("location: ../index.php?dateerror=exceedlimit");
            exit();
        }

        else
        {
            if ($startDate == $endDate)
            {
                $noOfDays = 1;
            }
            else
            {
                $start = strtotime($startDate);
                $end = strtotime($endDate);

                $diff = $end - $start;
                $noOfDays = ($diff / (60 * 60 * 24));

            }

            echo $noOfDays;
        }

        echo '<p>'.$startDate.'</p>'.'<p>'.$endDate.'</p>'.'<p>'.$roomType.'</p>';
    }
    else 
    {
        header("location: ../index.php");
        exit();
    }

?>
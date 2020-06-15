<?php

    if (isset($_POST['room-submit']))
    {
        require "roomdb.php";

        $startDate = $_POST['startdate'];
        $endDate = $_POST['enddate'];
        $roomType = $_POST['roomtype'];
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $roomLimit = 5;

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
                $endDate = date('Y-m-d', strtotime($startDate. ' + 1 day'));
            }

            $start = strtotime($startDate);
            $end = strtotime($endDate);

            $diff = $end - $start;
            $noOfDays = ($diff / (60 * 60 * 24));

            $check = 0;
            
            for ($i = $startDate; $i < $endDate; $i = date('Y-m-d', strtotime($i. ' + 1 day')))
            {
                //echo '<p>'.$i.'</p>';
                $query = "SELECT COUNT(date) FROM rooms WHERE date = '".$i."'";
                if ($result = mysqli_query($link, $query))
                {
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                    {
                        $check ++;
                    }

                    else 
                    {
                        $query = "SELECT ".strtolower($roomType)." FROM rooms WHERE date = '".$i."'";
                        if ($result = mysqli_query($link, $query))
                        {
                            $row = mysqli_fetch_array($result);
                            print_r($row);
                            if ($row[0] == NULL || $row[0] < $roomLimit)
                            {
                                $check ++;
                            }
                            /*else 
                            {
                                header("location: ../index.php?dateerror=soldout");
                                exit();
                            }*/
                        }
                        
                    }
                }
                
            }

            if ($check == $noOfDays)
            {
                header("location: ../index.php?roomstatus=available&startdate=".$startDate."&enddate=".$endDate."&roomtype=".$roomType);
                exit();
            }

            else
            {
                header("location: ../index.php?dateerror=soldout");
                exit();
            }

        }

    }

    else 
    {
        header("location: ../index.php");
        exit();
    }


?>
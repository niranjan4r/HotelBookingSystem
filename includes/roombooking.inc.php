<?php

    if (isset($_GET['room-submit']))
    {
        require "roomdb.php";

        $startDate = $_GET['startdate'];
        $endDate = $_GET['enddate'];
        $roomType = $_GET['roomtype'];
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

            
            for ($i = $startDate; $i < $endDate; $i = date('Y-m-d', strtotime($i. ' + 1 day')))
            {
                echo '<p>'.$i.'</p>';
                $query = "SELECT COUNT(date) FROM rooms WHERE date = '".$i."'";
                if ($result = mysqli_query($link, $query))
                {
                    $row = mysqli_fetch_array($result);
                    print_r ($row);

                    if ($row[0] == 0)
                    {
                        $query = "INSERT INTO rooms (date, ".strtolower($roomType).") VALUES ('".$i."', 1)";
                        mysqli_query($link, $query);
                    }

                    else 
                    {
                        $query = "SELECT ".strtolower($roomType)." FROM rooms WHERE date = '".$i."'";
                        if ($result = mysqli_query($link, $query))
                        {
                            $row = mysqli_fetch_array($result);
                            print_r($row);
                            if ($row[0] == NULL)
                            {
                                $query = "UPDATE rooms SET ".strtolower($roomType)." = 1 WHERE date = '".$i."' LIMIT 1";
                                mysqli_query($link, $query);
                            }
                            else if ($row[0] < $roomLimit) 
                            {
                                $query = "UPDATE rooms SET ".strtolower($roomType)." = ".($row[0] + 1)." WHERE date = '".$i."' LIMIT 1";
                                mysqli_query($link, $query);
                            }
                            else 
                            {
                                header("location: ../index.php?dateerror=soldout");
                                exit();
                            }
                        }
                        
                    }
                }
                
            }

            echo "<p>".$noOfDays."</p>";

            
            
        }

        echo '<p>'.$startDate.'</p>'.'<p>'.$endDate.'</p>'.'<p>'.$roomType.'</p>';
    }
    else 
    {
        header("location: ../index.php");
        exit();
    }

?>
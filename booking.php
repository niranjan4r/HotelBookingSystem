<?php
    require "header.php";
?>

<div id = "main">

    <div class = "container top-padding">

        <div class = "jumbotron">
        
            <h3>Confirm Booking</h3>
            <br>
            <div class = "container">
            
        <?php
            if (isset($_POST['book-submit']))
            {
                echo '<h5>Check In: '.$_POST['startdate'].' 1:00 pm</h5>
                <h5>Check Out: '.$_POST['enddate'].' 12:00 am</h5>
                <h5>Room Type: '.$_POST['roomtype'].'</h5>';
            }

            else
            {
                header("location: ../index.php");
                exit();
            }

            if (isset($_SESSION['userId']))
            {
                echo '
                <form name = "booking-form" action = "includes/roombooking.inc.php" method = "get">
                    <input type = "hidden" name = "startdate" value = '.$_POST['startdate'].'>
                    <input type = "hidden" name = "enddate" value = '.$_POST['enddate'].'>
                    <input type = "hidden" name = "roomtype" value = '.$_POST['roomtype'].'>
                    <button type = "submit" name = "booking-confirm" class = "btn btn-primary mb-2">Confirm Booking</button>
                </form>';
            }
            else 
            {
                echo '<p>Login to confirm your booking</p>';
            }

        ?>
            
            
            </div>
        
        </div>

    </div>


</div>

<?php
    require "footer.php";
?>
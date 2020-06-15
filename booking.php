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
            if (isset($_GET['book-submit']))
            {
                echo '<h5>Check In: '.$_GET['startdate'].' 1:00 pm</h5>
                <h5>Check Out: '.$_GET['enddate'].' 12:00 am</h5>
                <h5>Room Type: '.$_GET['roomtype'].'</h5>';
            }

            else
            {
                header("location: ../index.php");
                exit();
            }

            if (isset($_SESSION['userId']))
            {
                echo '<button>Confirm Booking</button>';
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
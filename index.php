<?php
    require "header.php";
?>



<div id = "main">        
    <div id = "carousel-images" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-images" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-images" data-slide-to="1"></li>
                <li data-target="#carousel-images" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" id = "carouselImages">
                <div class="carousel-item active">
                    <img class="d-block w-100" src = "img/carousel11.jpg" alt="First slide">
                 </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src = "img/carousel12.jpg" alt="Second slide">
                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src = "img/carousel13.jpg" alt="Third slide">
                </div>
            </div>
    </div>
            
    <div class = "container top-padding" id = "availability">
        <div class="jumbotron">
            <h4>Check availability and Book</h4>
            <br>
            <form name = "booking-form" action = "includes/checkavailability.inc.php" class = "form-group justify-content-center" method = "get">
                <div class="row">

                    <div class="col-md-3">
                        <label for="startdate" class="control-label">From</label>
                    </div>
                    <div class="col-md-3">
                        <label for="enddate" class="control-label">To</label>
                    </div>

                </div>

                <div class="row">

                    <?php 

                        $strt = "";
                        $end = "";
                        $readOnly = "";
                        $dis1 = ""; $dis2= ""; $dis3 = "";

                        if (isset($_GET['roomstatus']))
                        {
                            $strt = "value = ".$_GET['startdate'];
                            $end = "value = ".$_GET['enddate'];
                            $readOnly = " readonly ";
                            if ($_GET['roomtype'] == "Standard")
                            {
                                $dis2 = " disabled ";
                                $dis3 = " disabled ";
                            }
                            else if ($_GET['roomtype'] == "Executive")
                            {
                                $dis1 = " disabled ";
                                $dis3 = " disabled ";
                            }
                            else if ($_GET['roomtype'] == "Premium")
                            {
                                $dis1 = " disabled ";
                                $dis2 = " disabled ";
                            }
                        }
                    echo '<div class="col-md-3">
                        <input type="date" '.$strt.$readOnly.' class="form-control" name = "startdate" id = "startdate">
                    </div>

                    <div class="col-md-3">
                        <input type="date" '.$end.$readOnly.' class="form-control" name = "enddate" id = "enddate">
                    </div>

                    <div class="col-md-4 form-group">
                        <select class="custom-select" name = "roomtype">
                            <option '.$dis1.'>Standard</option>
                            <option '.$dis2.'>Executive</option>
                            <option '.$dis3.'>Premium</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name = "room-submit" class="btn btn-primary mb-2">Check</button>
                    </div>'

                    ?>
                </div>

                <?php

                    if (isset($_GET['roomstatus']))
                    {
                        echo '
                            <div class="row justify-content-center">
                                <button type = "submit" formaction="booking.php" name = "book-submit" class="btn btn-primary mb-2">Book Now</button>
                            </div>';
                    }
                ?>

            </form>

        </div>
    </div>


</div> <!-- The navbar left menu main div closed-->     


<?php
    require "footer.php";
?>

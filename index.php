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

    <div>
            <?php 

                if (isset($_SESSION['userId']))
                {
                    echo '<form action = "includes/logout.inc.php" method = "post">
                    <button type = "submit" name = "logout-submit">Logout</button>
                </form>';
                }

                else
                {
                    echo '<form action = "includes/login.inc.php" method = "post">
                    <input type = "text" name = "emailusername" placeholder = "Username/E-mail">
                    <input type = "password" name = "pwd" placeholder = "Password">
                    <button type = "submit" name = "login-submit">Login</button>
                </form>
                <a href = "signup.php">Sign up</a>';
                }

            ?>
      
    </div>
        
        <div class = "container">
            
            <?php

                if (isset($_SESSION['userId']))
                {
                    echo "<p>You are logged in!</p>";
                }

                else if (isset($_GET['error']))
                {
                    if ($_GET['error'] == "emptyfields")
                    {
                        echo "<p>Fill in all the fields</p>";
                    }
                    else if ($_GET['error'] == "nouser")
                    {
                        echo "<p>The username or e-mail you entered doesn't exist in our records</p>";
                    }
                    else if ($_GET['error'] == "wrongpassword")
                    {
                        echo "<p>Entered Password is incorrect! Please double-check and try again</p>";
                    }
                }
                else
                {
                    echo "<p>You are logged out!</p>";
                }

            ?>

        </div>
            
        <div class = "container">
        <div class="jumbotron">
            <h4>Check availability and Book</h4>
            <br>
            <form>
                <div class="row">
                    <div class="col-md-3">
                        <label for="startdate" class="control-label">From</label>
                    </div>
                    <div class="col-md-3">
                        <label for="enddate" class="control-label">To</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" class="form-control" name = "startdate" id="startdate">
                    </div>

                    <div class="col-md-3">
                        <input type="date" class="form-control" name = "enddate" id="enddate">
                    </div>

                    <div class="col-md-4 form-group">
                        <select class="custom-select" name = "roomtype">
                            <option>Standard</option>
                            <option>Executive</option>
                            <option>Premium</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name = "room-submit" class="btn btn-primary mb-2">Book</button>
                    </div>
                </div>
            </form>
        </div>
        </div>


</div> <!-- The navbar left menu main div closed-->     


<?php
    require "footer.php";
?>

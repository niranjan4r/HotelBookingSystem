<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel = "stylesheet" href = "styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>The Voyaguer</title>
</head>
<body>
    <header>
    
        <nav class = "navbar text-uppercase fixed-top navbar-light">
            <div id = "navbar-left-elements">
            <span onclick="openNav()">
                <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive">
                    <span class = "navbar-toggler-icon"></span>
                </button>
            </span>
                
                
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href = "index.php">Home</a>
                    <a href = "#">Restaurant</a>
                    <a href = "#"></a>
                    <a href = "#"></a>
                </div>


                <div class = "nav-element-left">
                    <a href = "#" id = "contact-text"><i class="fa fa-phone" aria-hidden="true"></i>
                    Contact
                    </a>
                </div>

            </div>

            <div class = "navbar-header">
                <a class="navbar-brand" href="#">
                    <img src = "img/logo11.png" width = "120" height = "80" class="d-inline-block align-top" alt="">
                </a>
            </div>
            <div id = "navbar-right-elements">
                
                
                <?php
                if (isset($_SESSION['userId']))
                {
                    echo '<form action = "includes/logout.inc.php" method = "post">
                        <button class = "btn btn-primary nav-element-right" type = "submit" name = "logout-submit">Logout</button>
                        </form>';
                }
                else 
                {
                    echo '<a href = "signup.php"><button class = "btn btn-primary nav-element-right" type = "button" href = "signup.php">
                        Signup
                    </button></a>
                    <button class = "btn btn-primary nav-element-right" type = "button" data-toggle = "modal" data-target = "#login-modal">
                        Login
                    </button>';
                }
                ?>

            </div>

        </nav>

        <!-- Login Modal -->
        <div class="modal fade" id = "login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">Sign in to book a room or to manage your bookings</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class = "container login-form">
                            <div class = "row">
                                <div class = "col">
                                    <form action = "includes/login.inc.php" class = "form-group text-center" method = "post">
                                        <input type = "text" class = "form-control form-element" name = "emailusername" placeholder = "Username/E-mail">
                                        <input type = "password" class = "form-control form-element" name = "pwd" placeholder = "Password">
                                        <button type = "submit" class = "btn btn-primary form-element" name = "login-submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer error-messages">


                    <?php
                        if (isset($_GET['error']))
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
                    ?>


                    </div>
                </div>
            </div>
        </div>
        

    </header>

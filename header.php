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
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    Contact
                </div>

            </div>

            <div class = "navbar-header">
                <a class="navbar-brand" href="#">
                    <img src = "img/logo11.png" width = "120" height = "80" class="d-inline-block align-top" alt="">
                </a>
            </div>
            <div id = "navbar-right-elements">
                
                <a href = "signup.php"><button class = "btn btn-primary nav-element-right" type = "button" href = "signup.php">
                    Signup
                </button></a>
                <button class = "btn btn-primary nav-element-right" type = "button">
                    Login
                </button>
            </div>
            

        </nav>

        

    </header>

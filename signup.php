<?php
    require "header.php";
?>


    <div id = "main">
        <div class = "container top-padding">

            <h1>Signup</h1>

            <?php

                if (isset($_GET['error']))
                {
                    if ($_GET['error'] == "emptyfields")
                    {
                        echo "<p>Fill in all fields</p>";
                    }
                    else if ($_GET['error'] == "invalidmailusername")
                    {
                        echo "<p>Username and e-mail are not valid</p>";
                    }
                    else if ($_GET['error'] == "invalidmail")
                    {
                        echo "<p>E-mail not valid</p>";
                    }
                    else if ($_GET['error'] == "invalidusername")
                    {
                        echo "<p>Username not valid</p>";
                    }
                    else if ($_GET['error'] == "passwordcheck")
                    {
                        echo "<p>Entered Passwords do not match</p>";
                    }
                }
            ?>
            <div class = "container" style = "width: 70%">
                <form action = "includes/signup.inc.php" class = "form-group justify-content-center" method = "post">
                    <input type = "text" name = "userName" class = "form-control form-element" placeholder = "Username">
                    <input type = "text" name = "mail" class = "form-control form-element" placeholder = "E-mail">
                    <input type = "password" name = "pwd" class = "form-control form-element" placeholder = "Password">
                    <input type = "password" name = "confirmPwd" class = "form-control form-element" placeholder = "Confirm Password">
                    <input type = "number" name = "mobile" class = "form-control form-element" placeholder = "Mobile Number">
                    <button type = "submit" name = "signup-submit" class = "btn btn-primary form-element">Signup</button>
                </form>
            </div>

        </div>
    </div>


<?php
    require "footer.php";
?>

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

            <form action = "includes/signup.inc.php" method = "post">
                <input type = "text" name = "userName" placeholder = "Username">
                <input type = "text" name = "mail" placeholder = "E-mail">
                <input type = "password" name = "pwd" placeholder = "Password">
                <input type = "password" name = "confirmPwd" placeholder = "Confirm Password">
                <input type = "number" name = "mobile" placeholder = "Mobile Number">
                <button type = "submit" name = "signup-submit">Signup</button>
            </form>

        </div>
    </div>


<?php
    require "footer.php";
?>

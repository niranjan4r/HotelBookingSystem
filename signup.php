<?php
    require "header.php";
?>


    <main>
        <div class = "container">

            <h1>Signup</h1>
            <form action = "includes/signup.inc.php" method = "post">
            
                <input type = "text" name = "userName" placeholder = "Username">
                <input type = "text" name = "mail" placeholder = "E-mail">
                <input type = "password" name = "pwd" placeholder = "Password">
                <input type = "password" name = "confirmPwd" placeholder = "Confirm Password">
                <input type = "number" name = "mobile" placeholder = "Mobile Number">
                <button type = "submit" name = "signup-submit">Signup</button>

            </form>

        </div>
    </main>


<?php
    require "footer.php";
?>
<?php
    require "header.php";
?>


    <main>
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
    </main>


<?php
    require "footer.php";
?>

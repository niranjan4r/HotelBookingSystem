<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <header>
        <nav>

        </nav>

        <div>

            <form action = "includes/login.inc.php" method = "post">
                <input type = "text" name = "emailId" placeholder = "Username/E-mail">
                <input type = "password" name = "pwd" placeholder = "Password">
                <button type = "submit" name = "login-submit">Login</button>
            </form>
            <a href = "signup.php">Sign up</a>
            <form action = "includes/logout.inc.php" method = "post">
                <button type = "submit" name = "logout-submit">Logout</button>
            </form>
        </div>

    </header>
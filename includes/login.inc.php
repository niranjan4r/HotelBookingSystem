<?php

    if (isset($_POST['login-submit']))
    {
        require "dbh.php";

        $mailusername = $_POST['emailusername'];
        $password = $_POST['pwd'];

        if (empty($mailusername) || empty($password))
        {
            header("location: ../index.php?error=emptyfields");
            exit();
        }
        else 
        {
            $sql = "SELECT * FROM users WHERE username=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("location: ../index.php?error=sqlerror");
                exit();
            }
            else 
            {
                mysqli_stmt_bind_param($stmt, "ss", $mailusername, $mailusername);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result))
                {
                    $passwordcheck = password_verify($password, $row['password']);
                    if ($passwordcheck == false)
                    {
                        header("location: ../index.php?error=wrongpassword");
                        exit();
                    }
                    else if ($passwordcheck == true) 
                    {
                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['username'] = $row['username'];

                        header("location: ../index.php?login=success");
                        exit();
                    }
                    else 
                    {
                        header("location: ../index.php?error=wrongpassword");
                        exit();
                    }
                }
                else 
                {
                    header("location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else 
    {
        header("location: ../index.php");
        exit();
    }
<?php
    if (isset($_POST['signup-submit']))
    {
        require "dbh.php";

        $userName = $_POST['userName'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $confirmPassword = $_POST['confirmPwd'];
        $mobileNumber = $_POST['mobile'];

        if (empty($userName) || empty($email) || empty($password) || empty($confirmPassword) || empty($mobileNumber))
        {
            header("location: ../signup.php?error=emptyfields&userName=".$userName."&mail=".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName))
        {
            header("location: ../signup.php?error=invalidmailusername");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("location: ../signup.php?error=invalidmail&userName=".$userName);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName))
        {
            header("location: ../signup.php?error=invalidusername&mail=".$email);
            exit();
        }
        else if ($password !== $confirmPassword)
        {
            header("location: ../signup.php?error=passwordcheck&userName=".$userName."&mail=".$email);
            exit();
        }
        else 
        {
            $sql = "SELECT username FROM users WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("location: ../signup.php?error=sqlerror");
                exit();
            }
            else 
            {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0)
                {
                    header("location: ../signup.php?error=usernametaken&mail=".$email);
                    exit();
                }
                else 
                {
                    $sql = "INSERT INTO users (username, email, password, mobile) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("location: ../signup.php?error=sqlerror");
                        exit();
                    }       
                    else 
                    {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $hashedPassword, $mobileNumber);
                        mysqli_stmt_execute($stmt);
                        header("location: ../signup.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else 
    {
        header("location: ../signup.php");
        exit();
    }
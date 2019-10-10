<?php
if (isset($_POST['signup-submit'])){
    require "db.inc.php";

    $name = $_POST['name'];
    $email = $_POST['mail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (empty($name) || empty($email) || empty($phone) || empty($address)){
        header("Location: ../signup.php?error=emptyfield&name=".$name."&mail=".$email."&phone=".$phone);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&name=".$name."&phone=".$phone);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
        header("Location: ../signup.php?error=invalidname&mail=".$email."&phone=".$phone);
        exit();
    }
    // else if($password !== $passwordRepeat){
    //     header("Location: ../signup.php?error=passwordnotmatch&name=".$username."&mail=".email);
    //     exit();
    // }
    else {
        $sql = "SELECT nameUsers FROM users WHERE nameUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror1");
             exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=nametaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (nameUsers,emailUsers,phoneUsers,addressUsers) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }
                else {
                    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"ssss",$name, $email, $phone,$address);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
               
                   

                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        }
    }
    else {
        header("Location: ../signup.php");
        exit();
    }
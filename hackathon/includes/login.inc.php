<?php
if(isset($_POST['login-submit'])){
    require "db.inc.php";
    $mailId = $_POST['mailId'];
    $password = $_POST['pwd'];
    if (empty($mailId) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE Username=? OR Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerrror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"ss",$mailId, $mailId );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['PWd']);
                if($pwdCheck == false ){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else  if($pwdCheck == true){
                    session_start();
                    $_SESSION['Id'] = $row['SerialNo'];
                    $_SESSION['UserId'] = $row['UserName'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }

            }
        }
        
    }
    
}
else {
    header("Location: ../index.php");
    exit();
}
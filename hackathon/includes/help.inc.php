<?php
if (isset($_POST['help-submit'])){
    require "db.inc.php";

    $nameSender = $_POST['name'];
    $emailSender = $_POST['mail'];
    $phoneSender = $_POST['phone'];
    $addressSender = $_POST['address'];
    $descriptionSender = $_POST['desc'];
    $quantitySender = $_POST['quantity'];
    if (empty($nameSender) || empty($emailSender) || empty($phoneSender) || empty($addressSender) || empty($descriptionSender) || empty($quantitySender)){
        header("Location: ../help.php?error=emptyfield");
        exit();
    }
    else if(!filter_var($emailSender, FILTER_VALIDATE_EMAIL)){
        header("Location: ../help.php?error=invalidmail");
        exit();
    }
    $headers="From: ".$emailSender;
    $text="You have received an email from".$nameSender.".\n\n".$descriptionSender.".\n".$quantitySender;
    $subject="Food availabe here";
    $query=mysqli_query($conn,"SELECT emailUsers FROM users");
    while($row = mysqli_fetch_array($query)){
    mail('row',$subject,$text,$headers);
    }
  header("Location: index.php?mailsend");
}

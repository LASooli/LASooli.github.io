<?php
// the message
$msg = $_POST['Message'];

$subject = $_POST['Subject'];

$name = $_POST['Name'];
$email = $_POST['Email'];

if (isset($_POST['Phone'])){
    $phone = $_POST['Phone'];

    $msg .= "<br> Phone: $phone.";
}
if (isset($_POST['Address'])){
    $address = $_POST['Address'];
    $msg .= "<br> Address: $address.";
}



// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


//More Headers: From Email
$headers = "From: <$email>" . "\r\n";

// send email
mail('rawirinathan@gmail.com',$subject, $msg, $headers);

if (isset($_SESSION['lastPage'])){
    $lastPage = $_SESSION['lastPage'];
    header("Location: $lastPage");
} else {
    header("Location: index.php");
}
<?php

session_start();

$card_holder_name = '';
$card_number = '';
$card_expiry = '';
$card_cvv = '';


$db = mysqli_connect('localhost', 'root', '', 'aes');

$card_holder_name = mysqli_real_escape_string($db, $_POST['card_holder_name']);
$card_number = mysqli_real_escape_string($db, $_POST['card_number']);
$card_expiry = mysqli_real_escape_string($db, $_POST['card_expiry']);
$card_cvv = mysqli_real_escape_string($db, $_POST['card_cvv']);


//insert into card_details table
$sql = "SELECT card_number, card_expiry, card_cvv FROM card_details WHERE card_number='$card_number' AND card_expiry='$card_expiry' AND card_cvv='$card_cvv'";
$result = mysqli_query($db, $sql);



?>
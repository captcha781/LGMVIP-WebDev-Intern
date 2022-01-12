<?php
session_start();
error_reporting(0);

include "../../configuration/config.php";


if (isset($_POST['submit']) && isset($_POST['rollnumber']) || isset($_POST['name']) || isset($_POST['dobs']) || isset($_POST['language-1']) || isset($_POST['english']) || isset($_POST['maths']) || isset($_POST['science']) || isset($_POST['socialscience']) || isset($_POST['total']) || isset($_POST['status'])) {
    $editorialexam = $_SESSION['editorialexam'];
    $id = $_SESSION['id'];
    $rollnumber = $_POST['rollnumber'];
    $name = $_POST['name'];
    $dobs = $_POST['dobs'];
    $language = $_POST['language-1'];
    $english = $_POST['english'];
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $social = $_POST['socialscience'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $examupdatequery = "UPDATE `$editorialexam` SET `rollnumber`='$rollnumber', `name`='$name', `dob` ='$dobs', `language-1` ='$language', `english`='$english', `maths`='$maths', `science`='$science', `socialscience`='$social', `total`='$total', `status`='$status' WHERE id = $id";
    $examupdateresult = mysqli_query($conn, $examupdatequery);
    header("Location: /admin/admin.php");
}

if (isset($_POST['submitins']) && isset($_POST['rollnumberins']) && isset($_POST['nameins']) && isset($_POST['dobins']) && isset($_POST['languageins']) && isset($_POST['englishins']) && isset($_POST['mathsins']) && isset($_POST['scienceins']) && isset($_POST['socialscienceins']) && isset($_POST['totalins']) && isset($_POST['statusins'])) {
    $editorialexam = $_SESSION['editorialexam'];
    
    $rollnumberins = $_POST['rollnumberins'];
    $nameins = $_POST['nameins'];
    $dobins = $_POST['dobins'];
    $languageins = $_POST['languageins'];
    $englishins = $_POST['englishins'];
    $mathsins = $_POST['mathsins'];
    $scienceins = $_POST['scienceins'];
    $socialins = $_POST['socialscienceins'];
    $totalins = $_POST['totalins'];
    $statusins = $_POST['statusins'];
    //echo $rollnumberins." ".$nameins." ".$dobins." ".$languageins." ".$englishins." ".$mathsins." ".$scienceins." ".$socialins." ".$totalins." ".$statusins." ".$editorialexam;
    
    $examinsquery = "INSERT INTO `$editorialexam` (`rollnumber`, `name`, `dob`, `language-1`, `english`, `maths`, `science`, `socialscience`, `total`, `status`) VALUES ('$rollnumberins','$nameins','$dobins','$languageins','$englishins','$mathsins','$scienceins','$socialins','$totalins','$statusins')";
    
    $examinsresult = mysqli_query($conn, $examinsquery);
    header("Location: /admin/admin.php");
}


?>

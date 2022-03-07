<?php
//Conectarea la baza de date
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica aparitia erorilor la conectare
if(!$conn){
die("Database Error");
}
mysqli_set_charset($conn,"utf8");
$msg="";
if (array_key_exists("username",$_POST) &&
array_key_exists("nume_admin",$_POST)&&   
array_key_exists("password",$_POST)&&
array_key_exists("repassword",$_POST)
){
    if($_POST["password"]!== $_POST["repassword"])
    die("incorrect repassword");
    {
        
        // Inserarea parolei si celorlalte date
        $query = "INSERT INTO admin";
        $query .= "(username,nume_admin, password)";
        $query .= "VALUES('{$_POST["username"]}','{$_POST["nume_admin"]}','{$_POST["password"]}')";
        if(!mysqli_query($conn,$query)){
            echo $query;
            echo mysqli_error($conn);
        }
         ob_start();
            header("Location:../index.php");
            //trimiterea la locatia de dupa inserare
            exit();
    }
}
?>

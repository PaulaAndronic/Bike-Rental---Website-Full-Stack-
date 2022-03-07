<?php
//Conectarea la baza de date
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica aparitia erorilor la conectare
if(!$conn){
die("Database Error");
}
mysqli_set_charset($conn,"utf8");
$msg="";
if (array_key_exists("Nume",$_POST) &&
array_key_exists("Prenume",$_POST)&&
array_key_exists("CNP",$_POST)&&
array_key_exists("Strada",$_POST)&&
array_key_exists("Telefon",$_POST)

){
 
    {
        //se insereaza valorile in baza de date
        $query = "INSERT INTO clienti";
        $query .= "(Nume, Prenume,CNP,Strada,Telefon)";
        $query .= "VALUES('{$_POST["Nume"]}','{$_POST["Prenume"]}','{$_POST["CNP"]}','{$_POST["Strada"]}','{$_POST["Telefon"]}')";

        if(!mysqli_query($conn,$query)){
            echo $query;
            echo mysqli_error($conn);
        }
        ob_start();
            header("Location:../menuActions/customers.php");
            //trimiterea la locatia de dupa inserare
            exit();
    }
}
?>

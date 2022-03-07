<?php
//Conectarea la baza de date
session_start();
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica daca au fost erori la conectare
if(!$conn){
    die ('Conectarea la baza de date nu a reusit!');
}
//se preia ID-ul transmis prin link-ul din pagina anterioara
$rollno = $_GET['rn'];
//se sterg valorile din baza de date de la id-ul respectiv
$query = "DELETE FROM FURNIZORI WHERE Nume_Firma = '$rollno'";
$data = mysqli_query($conn, $query);

if($data)
{
  header("Location:deleteProviders.php");  
}

?>
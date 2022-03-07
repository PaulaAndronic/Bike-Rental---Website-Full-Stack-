<?php
//Conectarea la baza de date
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica aparitia erorilor la conectare
if(!$conn){
die("Database Error");
}
mysqli_set_charset($conn,"utf8");
$msg="";
if (array_key_exists("Marca",$_POST) &&
array_key_exists("Culoare",$_POST)&&
array_key_exists("Grosime_Roata",$_POST)&&
array_key_exists("Categorie_Varsta",$_POST)&&
array_key_exists("Pret_Ora",$_POST)
){
 
    {
        //se insereaza valori in baza de date
        $query = "INSERT INTO biciclete";
        $query .= "(Marca, Culoare,Grosime_Roata,Categorie_Varsta,Pret_Ora)";
        $query .= "VALUES('{$_POST["Marca"]}','{$_POST["Culoare"]}','{$_POST["Grosime_Roata"]}','{$_POST["Categorie_Varsta"]}','{$_POST["Pret_Ora"]}' )";

        if(!mysqli_query($conn,$query)){
            echo $query;
            echo mysqli_error($conn);
        }
        ob_start();
            header("Location:../menuActions/bikes.php");
            //trimiterea la locatia de dupa inserare
            exit();
    }
}
?>

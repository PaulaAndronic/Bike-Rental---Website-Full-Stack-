<?php
//Crearea conexiunii la baza de date
session_start();
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica daca a existat vreo eroare in timpul conectarii
if(!$conn){
    die ('Conectarea la baza de date nu a reusit!');
}
if(isset($_POST["save"])){
    //declarearea variabilelor
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        //select-ul din tabelul admin din baza de date
        $SQL = "SELECT * FROM admin WHERE 
        username='$username' AND password ='$password'";
        $query = mysqli_query($conn,$SQL);
        if (!$row = $query->fetch_assoc()) {
            //pagina catre care este redirectionat utilizatorul in cazul erorilor
            header("Location:index.php?info=gresit");
            die();
        } else {
            $_SESSION["nume"]= $row["nume_admin"];
            $_SESSION["ID"]= $row["ID"];
            ob_start();
            //pagina catre care este redirectionat utilizatorul in cazul in care nu apar erori
            header("Location:index.php");
            exit();
        }


    }
}
?>
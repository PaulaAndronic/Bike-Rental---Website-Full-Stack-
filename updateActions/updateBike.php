<?php
//Conectarea la baza de date
session_start();
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica daca au fost erori la conectare
if(!$conn){
    die ('Conectarea la baza de date nu a reusit!');
}
//se preiau valorile transmise prin link-ul din pagina anterioara
$rn = $_GET['rn'];
$mar = $_GET['mar'];
$cul = $_GET['cul'];
$cat = $_GET['cat'];
$gro = $_GET['gro'];
$pret = $_GET['pret'];
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
    <body>
<div class="loginbox1">
    <form method="post" action="">
    <h1>Editare Bicicletă</h1>
        <p>Numărul Bicicletei</p>
        <input type="text" value="<?php echo "$rn"?>" name="ID_Bicicleta">
        <p>Marcă</p>
        <input type="text" value="<?php echo "$mar"?>" name="Marca">
        <p>Culoare</p>
        <input type="text" value="<?php echo "$cul"?>" name="Culoare">
        <p>Grosime Roată</p>
        <input type="text" value="<?php echo "$gro"?>" name="Grosime_Roata">
         <p>Categorie Vârstă</p>
        <input type="text" value="<?php echo "$cat"?>"name="Categorie_Varsta">
         <p>Preț Oră</p>
        <input type="text" value="<?php echo "$pret"?>" name="Pret_Ora">
        <input type="submit" name="save" value="Salvează">
    </form>
</div>
</body>
</html>

<?php
//se verifica apasarea butonului de salvare
if(isset($_POST['save']))
{  
	$ID_Bicicleta = $_POST['ID_Bicicleta'];
	$Marca = $_POST['Marca'];
	$Culoare = $_POST['Culoare'];
	$Categorie_Varsta = $_POST['Categorie_Varsta'];
	$Grosime_Roata = $_POST['Grosime_Roata'];
	$Pret_Ora = $_POST['Pret_Ora'];
    //se updateaza baza de date cu noile valori alese de utilizator
$query = "UPDATE biciclete SET ID_Bicicleta = '$ID_Bicicleta', Marca = '$Marca', Culoare='$Culoare',Categorie_Varsta ='$Categorie_Varsta', Grosime_Roata='$Grosime_Roata',Pret_Ora='$Pret_Ora' WHERE ID_Bicicleta = '$ID_Bicicleta'";
$data = mysqli_query($conn,$query);

 if($data)
{
  header("Location:updateBikes.php");  
}
}
?>


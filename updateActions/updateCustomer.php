<?php
//Conectarea la baza de date
session_start();
$conn = mysqli_connect("localhost","root","","centrubiciclete3");
//se verifica daca au fost erori la conectare
if(!$conn){
    die ('Conectarea la baza de date nu a reusit!');
}
//se preiau valorile transmise prin link-ul din pagina anterioara
$nu = $_GET['nu'];
$pre = $_GET['pre'];
$cnp = $_GET['cnp'];
$str = $_GET['str'];
$tel = $_GET['tel'];
$feed = $_GET['feed'];
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
    <body>
<div class="loginbox1">
    <form method="post" action="">
    <h1>Editare Client</h1>
        <p>Nume</p>
        <input type="text" value="<?php echo "$nu"?>" name="Nume">
        <p>Prenume</p>
        <input type="text" value="<?php echo "$pre"?>" name="Prenume">
        <p>CNP</p>
        <input type="text" value="<?php echo "$cnp"?>" name="CNP">
        <p>Strada</p>
        <input type="text" value="<?php echo "$str"?>" name="Strada">
         <p>Telefon</p>
        <input type="text" value="<?php echo "$tel"?>"name="Telefon">
         <p>Feedback</p>
        <input type="text" value="<?php echo "$feed"?>" name="Feedback">
        <input type="submit" name="save" value="Salveaza">
    </form>
</div>
</body>
</html>

<?php
//se verifica apasarea butonului de salvare
if(isset($_POST['save']))
{  
	$Nume = $_POST['Nume'];
	$Prenume = $_POST['Prenume'];
	$CNP = $_POST['CNP'];
	$Strada = $_POST['Strada'];
	$Telefon = $_POST['Telefon'];
	$Feedback = $_POST['Feedback'];
    //se updateaza baza de date cu noile valori alese de utilizator 
$query = "UPDATE clienti SET Nume = '$Nume', Prenume = '$Prenume', CNP='$CNP',Strada ='$Strada', Telefon='$Telefon',Feedback='$Feedback' WHERE CNP = '$CNP'";
$data = mysqli_query($conn,$query);

 if($data)
{
  header("Location:updateCustomers.php");  
}
}
?>


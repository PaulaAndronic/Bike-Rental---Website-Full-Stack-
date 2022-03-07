<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
 @import url(http://www.stezzer.com/images/congrats.gif);

body {background-image: url("../pictures/congrats.gif");

  top: -30px;
  left: -10px;
  overflow: hidden;}

        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}
            
            h2 {
                margin-top: 20px;
                font-size: 35px;
                color: white;
                text-align: center;
                font-family: "Lucida Handwriting", Cursive;
            }
        </style>
    </head>
    <body>
         <div >

    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    
    $date = "SELECT count(det.ID_Inchiriere) as nr, concat(A.Nume,' ',A.Prenume) as nume from angajati A join detalii_inchiriere det on A.ID_Angajat = det.ID_Angajat where MONTH(det.Data_Inchirierii) = MONTH(NOW()) group by A.Nume order by count(det.ID_Inchiriere) DESC LIMIT 1 "
 ;

    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {
    	//afisarea datelor obtinute in urma selectului
        while ($row = $rezultat -> fetch_assoc())
        {   echo "<h2>Angajatul lunii este: </h2>";
            echo "<h2>". $row["nume"]. "</h2>";
        }
        echo "</table>";
    }
    else

    {
        echo "0 result";
    }
    //buton de intoarcere la pagina anterioara
    echo'
       <div class="buton">
             
        <br><br><form method:"post" action="../menuActions/employees.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';

    $conn->close();
    ?>
    
  
    
    </body>
    </html>

<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <style type="text/css">
        	.dropbtn {
  background-color: #EAF2F8;
  color: black;

  font-size: 20px;
  border: none;
  width: 300px;
  font-family: "Lucida Handwriting", Cursive;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
 
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.1);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #7FB3D5;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #7FB3D5;}
 
        .buton form input{width:300px;height:35px;margin-bottom:40px;font-family: "Lucida Handwriting", Cursive;;text-indent:5px;padding:2.5px}
        .buton form input:last-Child{background-color:#2C3E50;border:none;width:310px;height:40px;font-size:20px;color:white;cursor:pointer;transition:0.3s}
        .buton form input:last-Child:hover{background-color:#EAEDED;color:black}
            table 
            {
                border-collapse: collapse;
                width: 80%;
                color: black;
                font-family: "Lucida Handwriting", Cursive;
                font-size: 20px;
                text-align: center;
                margin:0 auto;
                margin-top: 15px;
                z-index: -1;
            }
            th
            {
                background-color: #2C3E50;
                color: white;
                font-size: 25px;
            }
            tr:nth-child(odd){ background-color: #D7DBDD; opacity:0.9;  }
            tr:nth-child(even){ background-color: #EAEDED  ; opacity: 0.9;}
        </style>
    </head>
    <body>

        <table>
            <th>Nume Client</th>
            <th>CNP</th>
           <th>Feedback</th>
            <th>Facturi</th>
           <th>Biciclete</th>
 
    <?php
    //conectarea la baza de date
    $conn = mysqli_connect("localhost","root","","centrubiciclete3");
    //select din tabelele clienti, detalii_inchiriere, client_inchiriere, biciclete  
    $date = "SELECT concat(c.Nume,' ',c.Prenume) as nume_client, CNP, Feedback, concat(di.Suma_de_plata,' lei ',di.Data_Inchirierii) as inc, concat(b.Marca, ' ', b.Culoare) as mar from clienti c join detalii_inchiriere di on c.Id_CLient = di.Id_client join client_inchiriere ic on di.Id_Inchiriere = ic.Id_Inchiriere join biciclete b on ic.Id_Bicicleta = b.Id_Bicicleta order by di.Suma_de_plata, concat(c.Nume,' ',c.Prenume)";
    $rezultat = $conn->query($date);
    if ($rezultat -> num_rows > 0)
    {

        while ($row = $rezultat -> fetch_assoc())
        {   //afisarea datelor in tabel
            echo "<tr><td>".  $row["nume_client"]. "</td>
            <td>".  $row["CNP"]. "</td>
            <td>".  $row["Feedback"]. "</td>
            <td>".  $row["inc"]. "</td>
            <td>".  $row["mar"]. "</td>
            </tr>";
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
             
        <br><br><form method:"post" action="../menuActions/customers.php" style="text-align: center;">
                <input type="submit" value="Înapoi">
                </form>
                </div>
        ';
    $conn->close();
    ?>
    

    </body>
    </html>